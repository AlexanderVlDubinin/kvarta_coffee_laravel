<?php

namespace App\Services;

use App\Models\Lead;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class LeadService
{
    /**
     * Processing and creating a new application with anti-duplication protection.
     *
     * @param array $data
     * @return Lead
     * @throws Exception
     * @throws Throwable
     */
    public function createLead(array $data): Lead
    {
        // 1. Normalizing the phone before checking and saving
        $normalizedPhone = $this->normalizeBelarusianPhone($data['phone']);
        $data['phone'] = $normalizedPhone;

        // Converting the phone string to a pure number for advisory lock
        $lockId = (int) $normalizedPhone;

        // 2. Launching a database transaction
        return DB::transaction(function () use ($data, $lockId, $normalizedPhone) {

            // 3. Getting an exclusive advisory lock for this phone number.
            // If another parallel process is processing the same number, it will wait here.
            DB::statement('SELECT pg_advisory_xact_lock(?)', [$lockId]);

            // 4. Checking if the request has appeared in the last 10 minutes.
            $tenMinutesAgo = Carbon::now()->subMinutes(10);

            $existingLead = Lead::query()->where('phone', $normalizedPhone)
                ->where('created_at', '>=', $tenMinutesAgo)
                ->first();

            // 5. If a duplicate is found, throw an exception (Laravel will automatically make a Rollback of the transaction)
            if ($existingLead) {
                throw new Exception('Вы уже отправили заявку. Повторный заказ не требуется, мы скоро свяжемся с вами!');
            }

            $data['name'] = strip_tags($data['name']);
            $data['comment'] = strip_tags($data['comment']);

            // 6. If everything is clear, save the application
            // When exit the closure, Laravel will Commit, and the lock will be lifted automatically.
            return Lead::query()->create($data);
        });
    }

    /**
     * Bringing any valid Belarusian number to a single standard: 375XXXXXXXXX
     */
    private function normalizeBelarusianPhone(string $phone): string
    {
        // Remove all spaces, hyphens, brackets, and plus signs.
        return preg_replace('/[^0-9]/', '', $phone);
    }
}

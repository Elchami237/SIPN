<?php

namespace App\Console\Commands;

use App\Models\Contact;
use App\Models\Quote;
use Illuminate\Console\Command;

class CleanOldIpAddresses extends Command
{
    protected $signature = 'privacy:clean-ips';
    protected $description = 'Clean IP addresses older than 90 days for GDPR compliance';

    public function handle(): int
    {
        $cutoffDate = now()->subDays(90);

        // Clean contacts
        $contactsUpdated = Contact::where('ip_stored_at', '<', $cutoffDate)
            ->whereNotNull('ip_address')
            ->update([
                'ip_address' => null,
                'ip_stored_at' => null,
            ]);

        // Clean quotes
        $quotesUpdated = Quote::where('ip_stored_at', '<', $cutoffDate)
            ->whereNotNull('ip_address')
            ->update([
                'ip_address' => null,
                'ip_stored_at' => null,
            ]);

        $this->info("Cleaned {$contactsUpdated} contact IP addresses");
        $this->info("Cleaned {$quotesUpdated} quote IP addresses");

        return Command::SUCCESS;
    }
}

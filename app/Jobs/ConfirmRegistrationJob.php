<?php
namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmRegistrationMail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmRegistrationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $record)
    {
        $this->record = $record;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info($this->record);
        Mail::to($this->record->email)->send(new ConfirmRegistrationMail($this->record));
    }
}

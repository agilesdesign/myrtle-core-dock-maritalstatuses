<?php

namespace Myrtle\Core\MaritalStatuses\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Myrtle\MaritalStatuses\Models\MaritalStatus;

class MaritalStatusesSeedController extends Controller
{
    public function create()
    {
        $this->authorize('seed', MaritalStatus::class);

        $statuses = \MaritalStatusesTableSeeder::statuses();

        return view('admin::docks.maritalstatuses.seed.create')->withStatuses($statuses);
    }

    public function store(Request $form)
    {
        $this->authorize('seed', MaritalStatus::class);

        Artisan::call('db:seed', ['--class' => \MaritalStatusesTableSeeder::class]);

        flasher()->alert('Marital Stasuses seeded successfully', 'success');

        return redirect(route('admin.maritalstatuses.index'));
    }
}

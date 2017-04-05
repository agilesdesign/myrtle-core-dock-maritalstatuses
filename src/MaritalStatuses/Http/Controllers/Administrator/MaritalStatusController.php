<?php

namespace Myrtle\Core\MaritalStatuses\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Myrtle\MaritalStatuses\Models\MaritalStatus;

class MaritalStatusController extends Controller
{
    public function index(MaritalStatus $policytype)
    {
        $maritalstatuses = MaritalStatus::orderBy('name')->paginate();

        return view('admin::maritalstatuses.index')
            ->withMaritalstatuses($maritalstatuses)
            ->withPolicytype($policytype);
    }

    public function create(MaritalStatus $maritalstatus)
    {
        return view('admin::maritalstatuses.create')->withMaritalstatus($maritalstatus);
    }

    public function store(Request $request, MaritalStatus $maritalstatus)
    {
        $maritalstatus->create($request->toArray());

        flasher()->alert('Marital Status added successfully', 'success');

        return redirect(route('admin.maritalstatuses.index'));
    }

    public function edit(MaritalStatus $maritalstatus)
    {
        return view('admin::maritalstatuses.edit')->withMaritalstatus($maritalstatus);
    }

    public function update(Request $request, MaritalStatus $maritalstatus)
    {
        $maritalstatus->update($request->toArray());

        flasher()->alert('Marital Status updated successfully', 'success');

        return redirect(route('admin.maritalstatuses.index'));
    }

    public function destroy(Request $request, MaritalStatus $maritalstatus)
    {
        $this->authorize('delete', $maritalstatus);

        $maritalstatus->delete();

        flasher()->alert('Marital Status removed successfully', 'success');

        return redirect(route('admin.maritalstatuses.index'));
    }
}

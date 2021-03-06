<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Challenge\AddFormRequest;
use App\Http\Service\Teacher\AccountChallengeService;
use App\Http\Service\Teacher\ChallengeService;
use App\Models\AccountChallenge;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends Controller
{

    protected $challengeService;
    protected $accountChallengeService;

    public function __construct(ChallengeService $challengeService, AccountChallengeService $accountChallengeService)
    {
        $this->challengeService = $challengeService;
        $this->accountChallengeService = $accountChallengeService;
    }

    public function index()
    {
        return view('admin.challenges', [
            'title' => 'Challenges',
            'role' => Auth::user()->role,
            'challenges' => $this->challengeService->getAll(),
        ]);
    }

    public function getOne(Request $request)
    {
        if (!Gate::allows('role-T')) {
            abort(403);
        }
        return view('admin.challenge', [
            'title' => 'Details  Challenge',
            'challenge' => $this->challengeService->findOne($request),
            'submitedList' => $this->accountChallengeService->find($request),
        ]);
    }

    public function add()
    {
        return view('admin.addChallenge', [
            'title' => 'Create Challenges',
        ]);
    }
    public function add_a(AddFormRequest $request)
    {
        if (!Gate::allows('role-T')) {
            abort(403);
        }
        $rs = $this->challengeService->add($request);
        return redirect()->route('challenges');
    }

    public function delete(Request $request)
    {
        if (!Gate::allows('role-T')) {
            abort(403);
        }
        $this->challengeService->destroy($request);
        return redirect()->back();
    }

    public function submit(Request $request)
    {
        $content = $this->accountChallengeService->add($request);
       
        if ($content !='') {
            return redirect()->back()->with('right-answer', $content);
        } else {
            return redirect()->back()->with('wrong-answer', 'Wrong Answer');
        }
    }
}
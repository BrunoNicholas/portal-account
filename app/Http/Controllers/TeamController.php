<?php
namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Shop;
use App\User;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(20);
        return view('system.teams.index',compact(['teams']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams  = Team::where('user_id',Auth::user()->id)->latest()->paginate(20);
        $users  = User::where('role','client')->latest()->paginate(50);
        $salons = Salon::where('user_id',Auth::user()->id)->latest()->get();
        $shops  = Shop::where('user_id',Auth::user()->id)->latest()->get();
        return view('system.teams.create',compact(['teams','users','salons','shops']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'team_name'     => 'required"unique:teams',
            'user_id'       => 'required',
            'status'        => 'required',
            'team_user'     => 'required',
        ]);
        Team::create($request->except(['team_user','_token']));

        // finding team
        $team   = Team::where('team_name',$request->team_name)->first();
        $a      = 0;

        foreach ($request->team_user as $key => $value) {
            ++$a;
            $teamuser[$a]   = new TeamUser();
            $teamuser[$a]->user_id      = $value;
            $teamuser[$a]->team_id      = $team->id;
            $teamuser[$a]->salon_id     = $request->salon_id;
            $teamuser[$a]->shop_id      = $request->shop_id;
            $teamuser[$a]->company_id   = $request->company_id;
            $teamuser[$a]->status = $request->status;
            $teamuser[$a]->save();
        }
        return redirect()->route('home')->with('success','Team saved successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return back()->with('danger','Team not found. It\'s either missing or deleted.');
        }
        return view('system.teams.show',compact(['team']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return back()->with('danger','Team not found. It\'s either missing or deleted.');
        }
        return view('system.teams.edit',compact(['team']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'project_id'    => 'required',
            'user_id'       => 'required',
            'status'        => 'required',
        ]);
        Team::find($id)->update($request->all());
        return redirect()->route('teams.index')->with('success','Team saved successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Team::find($id);
        $item->delete();
        return redirect()->route('teams.index')->with('danger', 'Team deleted successfully!');
    }
}
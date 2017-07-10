<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mount;

class DashboardController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $stats = new \App\Models\Icecast\Stats;
        $this->data['icecast'] = $stats->get();
        $this->data['icecast_mounts'] = [];
        foreach ($this->data['icecast']['source'] as $i) {
          $i['mount_id'] = preg_replace('%/%', '', $i['@mount']);
          if (preg_match('/^\d*$/m', $i['mount_id'])) {
            $m = \App\Models\Mount::where('mount', '=', $i['mount_id'])->first();
            if ($m)
            {
              $i['description'] = $m->description;
            }
            else {
              $i['description'] = 'N/A';
            }
          }
          else {
            $i['description'] = 'N/A';
          }

          /*Calculate how full the mount is*/
          if ($i['listeners'] == 0 ) {
            $i['percentage'] = 0;
          } else {
            $i['percentage'] = round($i['listeners'] / $i['max_listeners']);
          }
          if ($i['percentage'] < 51 ) {
            $i['progress_bar'] = 'success';
          } elseif ($i['percentage'] < 90 ) {
            $i['progress_bar'] = 'warning';
          } else {
            $i['progress_bar'] = 'danger';
          }
          $this->data['icecast_mounts'][] = $i;
        }
        //dd($this->data['icecast_mounts']);
        $this->data['conferences'] = \App\Models\Conference::orderBy('conference_id', 'asc')->get();

        return view('admin.dashboard', $this->data);
    }

}

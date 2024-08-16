<?php

namespace App\Http\Controllers\web;

use App\Filters\UsersFilters;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\GeneralResponse;
use Symfony\Component\HttpFoundation\Request;
class UserController extends Controller
{
   protected $UserRepository;
   protected $modelName;
   protected $breadcrumbs;
   protected $configData;

   public function __construct(UserRepositoryInterface $UserRepository)
   {
      $this->UserRepository  = $UserRepository;
      $this->modelName       =  __('lang.users.index');
      $this->configData      = ['pageHeader' => true,'modelName' =>$this->modelName];
      $this->breadcrumbs     = [  ['link'=>"home",'name'=>__('lang.Home')]];
   }

   public function index(UsersFilters $filters)
   {
     $this->configData['title'] = $this->modelName;
     $this->breadcrumbs[] = ['name'=>__('lang.users.List')];
     $users  =  $this->UserRepository->getUsersPaginate($filters);
     return view('pages.users.index')->with(['users'=>$users,'configData'=>$this->configData,'breadcrumbs'=>$this->breadcrumbs]);
   }
   public function show($id)
   {
       $this->configData['title'] = __('lang.users.show');
       $this->breadcrumbs[] = ['link'=>'users.index','name'=>__('lang.users.List')];
       $this->breadcrumbs[] = ['name'=>__('lang.users.show')];
       $User  =  $this->UserRepository->find($id);
       return view('pages.users.show')->with(['User'=>$User,'configData'=>$this->configData,'breadcrumbs'=>$this->breadcrumbs]);
   }
   public function edit($id)
   {
       $this->configData['title'] = __('lang.users.update');
       $this->breadcrumbs[] = ['link'=>'users.index','name'=>__('lang.users.List')];
       $this->breadcrumbs[] = ['name'=>__('lang.users.update')];
       $User  =  $this->UserRepository->find($id);
       return view('pages.users.edit')->with(['User'=>$User,'configData'=>$this->configData,'breadcrumbs'=>$this->breadcrumbs]);
   }
   public function update($id)
   {
     $this->configData['title'] = __('lang.users.update');
     $this->breadcrumbs[] = ['link'=>'users.index','name'=>__('lang.users.List')];
     $this->breadcrumbs[] = ['name'=>__('lang.users.update')];
     $User  =  $this->UserRepository->find($id);
     return view('pages.users.edit')->with(['User'=>$User,'configData'=>$this->configData,'breadcrumbs'=>$this->breadcrumbs]);
   }
   public function create()
   {
     $this->configData['title'] = __('lang.users.update');
     $this->breadcrumbs[] = ['link'=>'users.index','name'=>__('lang.users.List')];
     $this->breadcrumbs[] = ['name'=>__('lang.users.create')];
     return view('pages.users.create')->with(['configData'=>$this->configData,'breadcrumbs'=>$this->breadcrumbs]);
   }

  public function store()
  {
    $this->configData['title'] = __('lang.users.update');
    $this->breadcrumbs[] = ['link'=>'users.index','name'=>__('lang.users.List')];
    $this->breadcrumbs[] = ['name'=>__('lang.users.create')];
    return view('pages.users.create')->with(['configData'=>$this->configData,'breadcrumbs'=>$this->breadcrumbs]);
  }


}

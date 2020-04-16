

@extends('layouts.app')
@section('contect')
    <div class="container">
        <h1>CRUD app</h1>
        <div class="card">

            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i>
                
            <strong>{{!is_null($contact)?'Edit User':'Add User'}}</strong>
                <a href="{{route('contacts.index')}}" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>
            </div>

            <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                    <form action="{{isset($contact)&&!is_null($contact)?route('contacts.update',[$contact]):route('contacts.store')}}" method="POST">
                        @csrf
                        @if($contact)
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <label>User Name <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter user name" required="" 
                            value={{!is_null($contact)?$contact->user_name:''}}>
                            @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                       

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>User Email <span class="text-danger">*</span></label>
                            <input type="email" name="useremail" id="useremail" class="form-control @error('useremail') is-invalid @enderror"
                            value="{{!is_null($contact)?$contact->user_email:''}}" placeholder="Enter user email" required="">
                            @error('useremail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label>User Phone <span class="text-danger">*</span></label>
                            <input  type="tel" class="tel form-control @error('userphone') is-invalid @enderror" value="{{!is_null($contact)?$contact->user_phone:''}}"name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Enter user phone" required="">
                            @error('userphone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> {{!is_null($contact)?'Edit User':'Add User'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

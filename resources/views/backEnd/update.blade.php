@extends('layouts.admin')
@section('content')
<div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">{{ __('Account Info') }}</h1>
                    @if ($errors->account->any())
                        <ul class="mt-3 list-none list-inside text-sm text-red-400">
                            @foreach ($errors->account->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(session()->has('account_message'))
                        <div class="mb-8 text-green-400 font-bold">
                            {{ session()->get('account_message') }}
                        </div>
                    @endif
                </div>
                <div class="w-full px-6 py-4 bg-white overflow-hidden">
<form method="POST" action="{{ route('admin.account.info.store') }}">
                    @csrf
<div class="py-2">
                            <label for="name" class="block font-medium text-sm text-gray-700{{$errors->account->has('name') ? ' text-red-400' : ''}}">{{ __('Name') }}</label>
<input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->account->has('name') ? ' border-red-400' : ''}}"
                                            type="text"
                                            name="name"
                                            value="{{ old('name', $user->name) }}"
                                            />
                        </div>
     <div class="py-2">
             <label for="email" class="block font-medium text-sm text-gray-700{{$errors->account->has('email') ? ' text-red-400' : ''}}">{{ __('Email') }}</label>
         <input id="email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->account->has('email') ? ' border-red-400' : ''}}"
                                            type="email"
                                            name="email"
                                            value="{{ old('email', $user->email) }}"
                                            />
                        </div>
              <div class="flex justify-end mt-4">

               <div class="py-2">
             <label for="email" class="block font-medium text-sm text-gray-700{{$errors->account->has('mobile') ? ' text-red-400' : ''}}">{{ __('Mobile') }}</label>
         <input id="email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->account->has('email') ? ' border-red-400' : ''}}"
                                            type="text"
                                            name="mobile"
                                            value="{{ old('mobile', $user->mobile) }}"
                                            />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>             

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
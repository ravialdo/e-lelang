<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['layout' => 'layouts.auth', 'section' => 'content'], function () {
	Route::livewire('/', 'login-component');
	Route::livewire('/login', 'login-component')->name('login');
	Route::livewire('/register', 'register-component')->name('register');
});

Route::group(['layout' => 'layouts.dashboard', 'section' => 'content'], function () {
	Route::livewire('/dashboard', 'dashboard-component')->name('dashboard');
	Route::livewire('/dashboard/petugas', 'petugas-component')->name('petugas');
	Route::livewire('/dashboard/masyarakat', 'masyarakat-component')->name('masyarakat');
	Route::livewire('/dashboard/barang','barang-component')->name('barang');
	Route::livewire('/dashboard/penawaran', 'lelang-component')->name('lelang');
	Route::livewire('/dashboard/history-lelang', 'history-component')->name('history');
	Route::livewire('/dashboard/generate-laporan')->name('laporan');
});


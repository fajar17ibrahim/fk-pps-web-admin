
				@extends('admin.layouts.pdf')

                @section('content')
                @include('admin/page/masterbook/masterbook-report-1')
                <div class="new-page"></div> 
                @include('admin/page/masterbook/masterbook-report-2')
                <div class="new-page"></div> 
                @include('admin/page/masterbook/masterbook-report-1')
                <div class="new-page"></div> 
                @include('admin/page/masterbook/masterbook-report-2')
                <div class="new-page"></div> 
                @include('admin/page/masterbook/masterbook-report-1')
                <div class="new-page"></div> 
                @include('admin/page/masterbook/masterbook-report-2')
                @endsection
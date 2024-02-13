@extends('kerangka.master')
@section('title')   
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>DataTable</h3>
            <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Simple Datatable
    </div>
    @php
        $no = 1;
    @endphp
    <section class="section">
    <div class="card-body">
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>status</th>
                </tr>
            </thead>
           <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td class="{{  $item->is_admin ? 'text-primary' : 'text-success' }}">{{ $item->is_admin ? 'Admin' : 'Member' }}</td>
               
            </tr> 
            @endforeach
           
           </tbody>
        </table>
    </div>
    </section>
</div>
@endsection
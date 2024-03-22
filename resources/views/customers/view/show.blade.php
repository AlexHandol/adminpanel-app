@extends('layout.layout')
@section('content')
    @include('includes.breadcrumb')
    {{-- <main class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-11 ">
                    <div class="card g-2">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> --}}
    <main class="content">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-lg-16 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>მომხმარებელი</th>
                                        <td>{{ $customer->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>მობილური</th>
                                        <td>{{ $customer->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>GPS ID</th>
                                        <td>{{ $customer->gps_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>SIM ნომერი</th>
                                        <td>{{ $customer->sim_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>რეგისტრაციის თარიღი</th>
                                        <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                    <tr>
                                        <th>სტატუსი</th>
                                        <td>
                                            <div class="btn btn-info btn-sm text-light status-btn" title="სტატუსი">პასიური
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="border: none;">მოქმედებები</th>
                                        <td style="border: none;">
                                            <div class="btn-group" role="group" aria-label="" style="gap:5px;">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="მომხმარებლის რედაქტირება">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" title="ანგარიშის წაშლა">
                                                        <i class="fa fa-user-times" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-16 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label class="mb-1">კომენტარის ტიპი</label>
                                    <select name="comment_type" class="form-select mb-1">
                                        <option value="1">...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1">კომენტარი</label>
                                    <textarea id="comment" name="comment" class="form-control" placeholder="ტექსტი ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="add-comment"
                                        class="btn btn-success btn-sm col-sm-3 pull-left mt-3">დამატება</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">ანგარიშის კომენტარები</h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="card-tools">
                                    <div class="pagination">
                                        <div id="pagination" class="light-theme simple-pagination">
                                            <ul>
                                                {{-- PAGINATION GOES HERE --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="modal fade" id="modal-delete-1529" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-3" id="exampleModalLabel">კომენტარის წაშლა</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>ნამდვილად გსურთ კომენტარის წაშლა?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">დახურვა</button>
                                                <a href="Delete.php?id=1529&amp;customer_id=451"
                                                    class="btn btn-danger">წაშლა</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table responsive" id="datatables-reponsive" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="comment-th">ტიპი</th>
                                            <th class="comment-th">კომენტარი</th>
                                            <th class="comment-th">ადმინი</th>
                                            <th class="comment-th">თარიღი</th>
                                            <th class="comment-th"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item">
                                            <td class="comment-td">ტრანზაქცია (თებერვალი)</td>
                                            <td class="comment-td"> </td>
                                            <td class="comment-td">ალექსანდრე ხანდოლიშვილი</td>
                                            <td class="comment-td">2024-02-22 22:50:43</td>
                                            <td style="padding-left: 2px;"><button class="delete-btn"
                                                    data-bs-toggle="modal" data-bs-target="#modal-delete-1529"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button></td>
    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
    </main>
@endsection

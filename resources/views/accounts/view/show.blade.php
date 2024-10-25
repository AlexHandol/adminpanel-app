@extends('layout.layout')
@section('content')
    @include('includes.breadcrumb')
    <div class="container-fluid">
        @include('includes.success-message')
    </div>
    <main class="content">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-lg-16 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ $account->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $account->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>GPS ID</th>
                                        <td>{{ $account->gps_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>SIM Number</th>
                                        <td>{{ $account->sim_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Create Date</th>
                                        <td>{{ $account->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tariff</th>
                                        <td>{{ $account->tariffs->tariff_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <div class="btn btn-sm text-light status-btn" id="statusBtn" title="status">
                                                {{ $account->statuses->status_name }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="border: none;">Actions</th>
                                        <td style="border: none;">
                                            <div class="btn-group" role="group" aria-label="" style="gap:5px;">
                                                <a href="{{ route('accounts.view.edit', $account->id) }}"
                                                    class="btn btn-primary btn-sm" title="მომხმარებლის რედაქტირება">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form id="deleteAccountForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        title="ანგარიშის წაშლა" data-bs-toggle="modal"
                                                        data-bs-target="#deleteAccountModalLabel">
                                                        <i class="fa fa-user-times"></i>
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
                            <form action="{{ route('accounts.comments.store', $account->id) }}" method="POST">
                                <div class="form-group">
                                    @csrf
                                    <label class="mb-2">Comment Type</label>
                                    <select name="comment_type" class="form-select mb-1">
                                        <option value="Test">Test</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Comment</label>
                                    <textarea id="comment" name="comment_content" class="form-control" placeholder="Text ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-success btn-sm col-sm-3 pull-left mt-3">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Account Comments</h6>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="card-tools">
                                    <div class="pagination">
                                        <div id="pagination" class="light-theme simple-pagination">
                                            <ul>
                                                {{-- PAGINATION GOES HERE --}}
                                                {{ $comments->withQueryString()->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
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
                                <table class="table responsive" id="datatables-reponsive" width="100%" cellspacing="0">
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
                                        @if ($comments->isNotEmpty())
                                            @foreach ($comments as $comment)
                                                <tr>
                                                    <td>{{ $comment->comment_type }}</td>
                                                    <td>{{ $comment->comment_content }}</td>
                                                    <td>{{ $comment->created_at->format('Y-m-d H:i:s') }}</td>
                                                    <td>{{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No matches found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('accounts.modal.delete-account-modal')
    </main>
@endsection

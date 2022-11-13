@extends('layout.main')

@section('main_content')
    <h2>Create New Group</h2>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6 ">
                    <form action="{{ route('group.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="groupTitlle" class="form-label">Group Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Eenter Your Group name" id="groupTitlle" aria-describedby="grouphelp" >
                            {{-- <div id="grouphelp" class="form-text">Title of user group</div> --}}

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

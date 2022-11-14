@extends('users.user_layout')

@section('user_content')
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }} </h6>
                </div>
                <div class="card-body">

                    <div class="row clearfix justify-content-md-center">
                        <div class="col-md-8">
                            <table class="table table-borderless table-striped">
                                <tr>
                                    <th class="text-right">Group :</th>
                                    <td> {{ $user->group->title }} </td>
                                </tr>
                                <tr>
                                    <th class="text-right">Name : </th>
                                    <td> {{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <th class="text-right">Eamil : </th>
                                    <td> {{ $user->email }} </td>
                                </tr>
                                <tr>
                                    <th class="text-right">Phone : </th>
                                    <td> {{ $user->phone }} </td>
                                </tr>
                                <tr>
                                    <th class="text-right">Address : </th>
                                    <td> {{ $user->address }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-md-10">

            @yield('user_content')

        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, dolore mollitia nulla at repellendus
            explicabo cupiditate laudantium, vel sunt sit laborum ratione voluptate ipsum magnam impedit quia
            voluptatum molestias cum libero, iste a. Praesentium reiciendis maiores asperiores maxime recusandae
            nulla, dicta quis fugit, deserunt labore hic quod at molestiae sint porro delectus. Obcaecati voluptatem
            consequatur, est excepturi fugiat eum facilis.
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam soluta tempore assumenda. Ipsa debitis
            exercitationem quam ex ratione nostrum a.
        </div>
    </div>




@stop

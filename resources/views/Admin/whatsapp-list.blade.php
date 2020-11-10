@extends('layouts.master')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>WhatsApp</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">List</h3>
                        </div>

                        <div class="box-body">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
                                    <i class="fa fa-refresh"></i> Refresh
                                </button>
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                     <th>Order</th>
                                     <th>Name</th>
                                     <th>Phone</th>
                                     <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getWhatsApp as $contact)
                                    <tr>
                                        <td>{{ $contact->order_id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <p>{{ $contact->message }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $getWhatsApp->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@extends('app')

@section('additional_scripts')
    <script type="text/javascript">
        var generateApiKeyUrl = "{{ route('keys.store') }}";
        var toggleApiKeyUrl = "{{ route('keys.toggle') }}";
    </script>
@endsection

@section('content')
    <section class="main-content-wrapper">
        <div class="pageheader">
            <h1>API Keys</h1>
            <p class="description">Manage your API keys</p>
            <div class="breadcrumb-wrapper hidden-xs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="active">API Keys</li>
                </ol>
            </div>
        </div>
        <section id="main-content">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Your API Keys</h3>
                        </div>
                        <div class="panel-body">

                                <table id="api-keys-table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Key</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($keys as $key)
                                        <tr>
                                            <td>{{ $key->key }}</td>
                                            <td>{!! $key->present()->statusButton() !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">New API Key</h3>
                        </div>
                        <div class="panel-body">
                            @if($keys->count() == 0)
                                <div id="no-keys-warning" class="alert alert-danger">You haven't created any keys yet. Go ahead and create your first one using the button below.</div>
                            @endif
                            <button id="generate-api-key" type="button" class="btn btn-success">Generate API Key</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

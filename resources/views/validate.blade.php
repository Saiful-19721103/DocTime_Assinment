@if ( $errors->any() )
<p class="alert alert-danger">{{ $errors->first() }}<button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if ( $errors->any('success') )
<p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if ( $errors->any('warning') )
<p class="alert alert-warning">{{ Session::get('warning') }}<button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if ( $errors->any('danger') )
<p class="alert alert-danger">{{ Session::get('danger') }}<button class="close" data-dismiss="alert">&times;</button></p>
@endif
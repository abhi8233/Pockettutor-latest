@extends('layouts.bookingApp')
@section('content')
	<div class="consent-screen google-consent-screen-redirect">
        <p>Go and Grant permissions</p>
        <a class="button button-primary button-large" href="<?php echo $url; ?>">
            Allow Permissions
        </a>
    </div>
@endsection

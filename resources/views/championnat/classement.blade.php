@extends('layout-main.app')

@section('content')
     <x-matchAndClassement :championnat="$championnat" :stats="$stats"  genre="classement" />
@endsection
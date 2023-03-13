@extends('layout-main.app')

@section('content')
     <x-matchAndClassement :championnat="$championnat" genre="match" stats="null" />
@endsection
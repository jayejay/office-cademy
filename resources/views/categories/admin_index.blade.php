<?php
/**
 * @var $category App\Category;
 */
?>
@extends('layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title">@lang('custom.Categories')</h3>
            <div class="panel-group">
                @foreach($categories as $category)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <b>
                                    <a data-toggle="collapse" href="#collapse{{$category->id}}">
                                        {{$category->id}}-
                                        @if($category->translations()->exists() && isset($category->translateOrDefault($locale)->name))
                                            {{$category->translateOrDefault($locale)->name}}
                                        @else
                                            @lang('custom.Nothing to show')
                                        @endif
                                    </a>
                                </b>
                            </h4>
                        </div>
                        <div id="collapse{{$category->id}}" class="panel-collapse collapse">
                            <table class="table">
                                @foreach($category->translations as $categoryTranslation)
                                    <tr class="">
                                        <td>{{$categoryTranslation->locale}}:</td>
                                        <td>{{$categoryTranslation->name}}</td>
                                        <td class="td-actions">
                                            <a href="{{ LaravelLocalization::getLocalizedURL($categoryTranslation->locale, route('categories.edit', $category->id), [], true) }}"
                                               rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td class="td-actions">
                                            <form method="post"
                                                  action="{{ LaravelLocalization::getLocalizedURL($categoryTranslation->locale, route('categories.delete',$category->id), [], true) }}">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" rel="tooltip" class="btn btn-danger"
                                                        data-original-title="" title="">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

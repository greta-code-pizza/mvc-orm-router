<?php

namespace DBProject\App\Controllers;

use \DBProject\App\Models\Articles;
use \DBProject\App\Models\Tags;

class ArticlesController extends ApplicationController {
  # GET
  public function list() {
    $articles = Articles::all();
    require('app/views/articles/list.php');
  }

  # GET
  public function show($id) {
    $article = Articles::findWithTags($id);
    require('app/views/articles/show.php');
  }

  # GET
  public function new() {
    $tags = Tags::all();
    require('app/views/articles/new.php');
  }

  # GET
  public function edit($id) {
    $article = Articles::find($id);
    $tags = Tags::all();
    require('app/views/articles/edit.php');
  }

  # POST
  public function create() {
    Articles::createWithTags();
    header('Location: /DBProject/app/articles/list');
  }

  # PUT
  public function update($id) {
    Articles::updateWithTags($id);
    header('Location: /DBProject/app/articles/show/' . $id);
  }

  # DELETE
  public function destroy($id) {
    Articles::destroy($id);
    header('Location: /DBProject/app/articles/list');
  }
}

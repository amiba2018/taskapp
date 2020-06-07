@extends('layouts.header')
@section('title', 'Question')
@section('content')
    <form action="/questions/{{ $question->id }}/answer" method="post">
        @csrf
        <div class="title">
        <span class="box-title">{{ App\User::getUserName($question->user_id) }}さんのお題</span>
            <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}である</h1></div>
            <div class="answers">
                <div class="first_answer">
                    <textarea name="first_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ old('first_answer') }}</textarea>
                    @error('first_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="second_answer">
                    <textarea name="second_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ old('second_answer') }}</textarea>
                    @error('second_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="third_answer">
                    <textarea name="third_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ old('third_answer') }}</textarea>
                    @error('third_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="btn">
                <button type="submit"  class="submit-btn">模範解答</button>
                <button type="button"  class="nav-btn" onclick="location.href='/questions/{{ $next_question_ids[0]['id'] }}'">次の問題へ</button>
                @if(Auth::user()->isUserFavorite(Auth::id()))
                <button type="button"  class="nav-btn" onclick="location.href='/favorites/{{ $question_ids[0]['question_id'] }}'">お気に入りの問題へ</button>
                @endif
            </div>
        </div>
    </form>
    <!-- <div id="app"> -->
  <!-- <span>@{{random()}}</span>
  <div>@{{ next_question_ids }}</div>
  <button v-on:click='spin()'></button>
  <button v-on:click='stop()'></button> -->

  <!-- <div id="app">
    <router-view> -->
      <!-- <example-component></example-component> -->
      <!-- </router-view> -->
    <!-- <router-link to='/ExampleComponent'>detail.vueに遷移</router-link> -->
      
    <!-- </div> -->
<!-- </div> -->
  <!-- //   new Vue({
  //   el: '#app',
  //   router: router,
  //   data: {
  //     text: @json($question->first_word) + 'とは' + @json($question->second_word),
  //     timeoutId: undefined,
  //     next_question_ids: @json($next_question_ids[0]['id']), 
  //   },
  //   methods:{
  //     'random': function() {
  //       const questions = @json($questions);
  //       var random = Math.floor(Math.random() * questions.length);
  //       console.log(questions[random]['id']);
  //       this.text = questions[random]['first_word'] + "とは" + questions[random]['second_word'];
  //       this.next_question_ids = questions[random]['id'];
  //     },
  //     spin: function() {
  //       this.random();
  //       this.timeoutId = setTimeout(()=>{
  //       this.spin();
  //       },100)
  //   },
  //   stop:function() {
  //     clearTimeout(this.timeoutId);
  //   }
  // }
  // })
  // -->
    
    <!-- <script src=" {{ mix('js/app.js') }} "></script> -->
    @endsection
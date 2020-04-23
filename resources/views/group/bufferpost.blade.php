@extends('layouts.app')
@section('content')
<div class="container-fluid app-body">
    <h3>Buffer Postings 
    </h3>

    <style type="text/css">
        #select_search, #select_groups{
            border-top:none; border-left:none; border-right:none; background: #f5f8fa;
            padding-left: 25px;
        }
        #select_search:focus {
            outline: none;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card" style="width: 100%">
                <div class="card-body"> -->

                <form>    
                    <div class="row">
                        <div class="col-md-3" style="position: relative;">
                            <span style="position: absolute; margin-left: 5px;"><i class="fa fa-search"></i></span>
                            <input type="text" name="select_search" id="select_search">
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="select_date" id="select_date" style="border: none;">
                        </div>
                        <div class="col-md-3">
                            <select id="select_groups">
                              <option value="volvo">All Groups</option>
                              @foreach($groups as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                    <br>
                    <table class="table table-bordered table-hover"> 
                        <thead> 
                            <tr>
                                <th>Group Name</th> 
                                <th>Group Type</th> 
                                <th>Account Name</th> 
                                <th>Post Text</th> 
                                <th>Time</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($bufferPosts as $key => $bp)
                           <tr>
                            <td>{{ $groupInfo[$key]->name }}</td>
                            <td>{{ $groupInfo[$key]->type }}</td>
                            <td>
                                <div class="media">
                                    <div class="media-right">
                                        <a href="">
                                            <span class="fa fa-{{$accountInfo[$key]->type}}"></span>

                                            <img width="50" class="media-object img-circle" src="{{$accountInfo[$key]->avatar}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </td> 
                            <td>{{ $bp->post_text }}</td>
                            <td>{{ $bp->sent_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span class="pull-right" style="margin-right: 90px;">
                    {{ $bufferPosts->links() }}
                    </span>
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#select_date').change(function(){
        var v = this.value;
        console.log(v);
        // var url = '?search=&date='+v+'&group=';
        var url = 'url/'+v;
        console.log(url);
        $.ajax({
                type :'GET',
                url : url,
                dataType :"json",
                data :{},
                success:function(data) 
                 {
                    console.log(data);
                 },
                  error: function()
                 {
                     console.log("error");
                 }
            });     


    });

});
    $('#select_groups').change(function(){
        console.log(this.value);
        
    });
    $('#select_search').keyup(function(){
        console.log(this.value);
        
    });
</script>
@endsection
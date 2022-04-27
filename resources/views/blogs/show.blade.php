<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <h3>{{$data[0]->title}}</h3>
    <p>{{$data[0]->content}}</p>
    <p>
        <img src="{{url('/blogs/'.$data[0]->image)}}" alt=""  height="250px" width="250px">
    </p>
    <p>

        {{  date('d-m-Y',$data[0]->pu_date)}}
    </p>

    <p>
        {{
            'By , '.$data[0]->userName
        }}
    </p>


</body>
</html>

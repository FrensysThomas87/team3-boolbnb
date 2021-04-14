{{-- Messaggio di errore nella creazione birra --}}
@if ($errors->any())
<div class="alert alert-danger">

 <ul>
   @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
   @endforeach
 </ul>

 </div>
@endif
{{-- /Messaggio di errore nella creazione birra -

{{-- // DA completare --}}

@php
if (isset($edit) && !empty($edit)){
    // EDIT CASE
    $method = 'PUT';
    $url = route('apartments.update', compact('apartment'));
}else{
    // CREATE CASE
    $url = route('apartments.store');
    $method = 'POST';
}
@endphp

{{-- enctype="multipart/form-data" --}}

<form class="form-horizontal" action={{$url}}  method="post" enctype="multipart/form-data" >
  @csrf
  @method($method)

  <div class="form-group">
    <label class="control-label col-sm-2" for="title">Titolo</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->title:'')}}" class="form-control {{($errors->has('title')?'is-invalid':'')}}" id="title" name="title" placeholder="Inserisci un Titolo">
      @php
        if($errors->has('title')){
          echo '<span class=text-danger>'. $errors->first('title') . '</span>';
        }
      @endphp
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="description">Descrizione:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->description:'')}}" class="form-control {{($errors->has('description')?'is-invalid':'')}}" id="description" name="description" placeholder="Inserisci una descrizione">
      @php
        if($errors->has('description')){
          echo '<span class=text-danger>'. $errors->first('description') . '</span>';
        }
      @endphp
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="rooms">N° di Stanze:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->rooms:'')}}" class="form-control {{($errors->has('rooms')?'is-invalid':'')}}" id="rooms" name="rooms" placeholder="Inserisci il numero di stanze">
      @php
        if($errors->has('rooms')){
          echo '<span class=text-danger>'. $errors->first('rooms') . '</span>';
        }
      @endphp
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="beds">N° di posti letto:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->beds:'')}}" class="form-control {{($errors->has('beds')?'is-invalid':'')}}" id="beds" name="beds" placeholder="Inserisci il numero di posti letto">
      @php
        if($errors->has('beds')){
          echo '<span class=text-danger>'. $errors->first('beds') . '</span>';
        }
      @endphp
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="baths">N° di bagni:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->baths:'')}}" class="form-control {{($errors->has('baths')?'is-invalid':'')}}" id="baths" name="baths" placeholder="Inserisci il numero di bagni">
      @php
        if($errors->has('baths')){
          echo '<span class=text-danger>'. $errors->first('baths') . '</span>';
        }
      @endphp
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="sq_meters">Mq:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->sq_meters:'')}}" class="form-control {{($errors->has('sq_meters')?'is-invalid':'')}}" id="sq_meters" name="sq_meters" placeholder="Inserisci i Mq dell'appartamento">
      @php
        if($errors->has('sq_meters')){
          echo '<span class=text-danger>'. $errors->first('sq_meters') . '</span>';
        }
      @endphp
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="price">Prezzo (gg):</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->price:'')}}" class="form-control {{($errors->has('price')?'is-invalid':'')}}" id="price" name="price" placeholder="Inserisci il prezzo dell'appartamento">
      @php
        if($errors->has('price')){
          echo '<span class=text-danger>'. $errors->first('price') . '</span>';
        }
      @endphp
    </div>
  </div>

{{--   <div class="checkbox">
    <label>
      <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
      Toggle per visible
    </label>
  </div> --}}

  <div class="form-group">
    <label for="visible">Visibile</label>
    <select class="form-control" id="visible" name="visible">
      <option value="true" >Si</option>
      <option value="false" >No</option>
    </select>
  </div>



  <div class="form-group">
    <label class="control-label col-sm-2" for="check_in">Orario di check-in:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->check_in:'')}}" class="form-control {{($errors->has('check_in')?'is-invalid':'')}}" id="check_in" name="check_in" placeholder="Inserire l'orario di check-in">
      @php
        if($errors->has('check_in')){
          echo '<span class=text-danger>'. $errors->first('check_in') . '</span>';
        }
      @endphp
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="check_out">Orario di check-out:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->check_out:'')}}" class="form-control {{($errors->has('check_out')?'is-invalid':'')}}" id="check_out" name="check_out" placeholder="Inserire l'orario di check-out">
      @php
        if($errors->has('check_out')){
          echo '<span class=text-danger>'. $errors->first('check_out') . '</span>';
        }
      @endphp
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="max_guests">N° massimo di ospiti:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->max_guests:'')}}" class="form-control {{($errors->has('max_guests')?'is-invalid':'')}}" id="max_guests" name="max_guests" placeholder="Inserire il numero massimo di ospiti">
      @php
        if($errors->has('max_guests')){
          echo '<span class=text-danger>'. $errors->first('max_guests') . '</span>';
        }
      @endphp
    </div>
  </div>

  <div class="form-group col-sm-10" >
    <label for="profile_pic">Copertina</label>
    <input class="form-control" type="file" name="profile_pic" value="" >
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Indirizzo:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->address:'')}}" class="form-control {{($errors->has('address')?'is-invalid':'')}}" id="address" name="address" placeholder="Inserire l'indirizzo">
      @php
        if($errors->has('address')){
          echo '<span class=text-danger>'. $errors->first('address') . '</span>';
        }
      @endphp
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="user_id">id utente:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->user_id:'')}}" class="form-control {{($errors->has('user_id')?'is-invalid':'')}}" id="user_id" name="user_id"  placeholder="{{Auth::id()}}">
      @php
        if($errors->has('user_id')){
          echo '<span class=text-danger>'. $errors->first('user_id') . '</span>';
        }
      @endphp
  </div>

  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="latitude">Latitudine:</label>
    <div class="col-sm-10">
      <input type="text" value="{{(isset($apartment)?$apartment->latitude:'')}}" class="form-control {{($errors->has('latitude')?'is-invalid':'')}}" id="latitude" name="latitude"  placeholder="Inserisci latitudine">
      @php
        if($errors->has('latitude')){
          echo '<span class=text-danger>'. $errors->first('latitude') . '</span>';
        }
      @endphp
    </div>
  </div>

</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="longitude">Longitudine:</label>
  <div class="col-sm-10">
    <input type="text" value="{{(isset($apartment)?$apartment->longitude:'')}}" class="form-control {{($errors->has('longitude')?'is-invalid':'')}}" id="longitude" name="longitude"  placeholder="Inserisci longitudine">
    @php
      if($errors->has('longitude')){
        echo '<span class=text-danger>'. $errors->first('longitude') . '</span>';
      }
    @endphp
  </div>
</div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary" type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>






</form>

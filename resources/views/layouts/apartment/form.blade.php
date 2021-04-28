{{-- Messaggio di errore nella creazione --}}
@if ($errors->any())
<div class="alert alert-danger">

 <ul>
   @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
   @endforeach
 </ul>

 </div>
@endif
{{-- /Messaggio di errore nella creazione --}}

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


<form class="form-horizontal" action={{$url}}  method="post" enctype="multipart/form-data" >
    @csrf
    @method($method)

    {{-- Titolo Appartamento --}}
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="title">Titolo</label>
            <input type="text" value="{{(isset($apartment)?$apartment->title:'')}}" class="form-control {{($errors->has('title')?'is-invalid':'')}}" id="title" name="title" placeholder="Inserisci un Titolo" required>
            @php
                if($errors->has('title')){
                    echo '<span class=text-danger>'. $errors->first('title') . '</span>';
                }
            @endphp
            <small id="emailHelp" class="form-text text-muted">Scrivi il titolo per il tuo alloggio</small>
        </div>
    </div>

    {{-- Descrizione --}}
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="description">Descrizione</label>
            <textarea type="text" class="form-control {{($errors->has('description')?'is-invalid':'')}}" id="description" name="description" rows="5">{{(isset($apartment)?$apartment->description:'')}}</textarea>
            @php
                if($errors->has('description')){
                  echo '<span class=text-danger>'. $errors->first('description') . '</span>';
                }
            @endphp
        </div>
    </div>

    {{-- Stanze e Letti --}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="rooms">Stanze</label>
            <input type="text" value="{{(isset($apartment)?$apartment->rooms:'')}}" class="form-control {{($errors->has('rooms')?'is-invalid':'')}}" id="rooms" name="rooms" required>
            @php
                if($errors->has('rooms')){
                echo '<span class=text-danger>'. $errors->first('rooms') . '</span>';
                }
            @endphp
        </div>
        <div class="form-group col-md-6">
            <label for="beds">Letti</label>
            <input type="text" value="{{(isset($apartment)?$apartment->beds:'')}}" class="form-control {{($errors->has('beds')?'is-invalid':'')}}" id="beds" name="beds" required>
            @php
                if($errors->has('beds')){
                    echo '<span class=text-danger>'. $errors->first('beds') . '</span>';
                }
            @endphp
        </div>
    </div>

    {{-- Bagni e mq --}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="baths">Bagni</label>
            <input type="text" value="{{(isset($apartment)?$apartment->baths:'')}}" class="form-control {{($errors->has('baths')?'is-invalid':'')}}" id="baths" name="baths" required>
            @php
                if($errors->has('baths')){
                    echo '<span class=text-danger>'. $errors->first('baths') . '</span>';
                }
            @endphp
        </div>
        <div class="form-group col-md-6">
            <label for="sq_meters">Superfice m<sup>2</sup> </label>
            <input type="text" value="{{(isset($apartment)?$apartment->sq_meters:'')}}" class="form-control {{($errors->has('sq_meters')?'is-invalid':'')}}" id="sq_meters" name="sq_meters" required>
            @php
            if($errors->has('sq_meters')){
                echo '<span class=text-danger>'. $errors->first('sq_meters') . '</span>';
            }
            @endphp
        </div>
    </div>

    {{-- checkin / checkout --}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="check_in">Orario di check-in</label>
            <input type="text" value="{{(isset($apartment)?$apartment->check_in:'')}}" class="form-control {{($errors->has('check_in')?'is-invalid':'')}}" id="check_in" name="check_in">
            @php
              if($errors->has('check_in')){
                echo '<span class=text-danger>'. $errors->first('check_in') . '</span>';
              }
            @endphp
        </div>
        <div class="form-group col-md-6">
            <label for="check_out">Orario di check-out</label>
            <input type="text" value="{{(isset($apartment)?$apartment->check_out:'')}}" class="form-control {{($errors->has('check_out')?'is-invalid':'')}}" id="check_out" name="check_out">
            @php
              if($errors->has('check_out')){
                echo '<span class=text-danger>'. $errors->first('check_out') . '</span>';
              }
            @endphp
        </div>
    </div>


    {{-- Numero max ospiti --}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="max_guests">N° massimo di ospiti</label>
            <input type="text" value="{{(isset($apartment)?$apartment->max_guests:'')}}" class="form-control {{($errors->has('max_guests')?'is-invalid':'')}}" id="max_guests" name="max_guests">
              @php
                if($errors->has('max_guests')){
                  echo '<span class=text-danger>'. $errors->first('max_guests') . '</span>';
                }
              @endphp
        </div>
    </div>

    {{-- Servizi --}}
    <div class="form-group">
        <div class="form-row">
            <div class="col-sm-2">
                {{-- <label for="services">Servizi</label> --}}
                <select class="form-select" multiple name="service_name[]" id="services" required>
                    <option disabled >SERVIZI</option>
                    @foreach ($services as $service)
                    <option value="{{$service->id}}"
                        @if (isset($apartment))
                            @foreach ($apartment->services as $apartmentService)
                                @if ($apartmentService->id === $service->id)
                                selected
                                @endif
                            @endforeach
                        @endif
                        >
                        {{$service->service_name}}
                    </option>
                    @endforeach
                  </select>
            </div>
        </div>
    </div>

    {{-- Prezzo a notte --}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="price">Prezzo a notte</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">€</span>
                </div>
                <input type="text" value="{{(isset($apartment)?$apartment->price:'')}}" class="form-control {{($errors->has('price')?'is-invalid':'')}}" id="price" name="price" required>
                @php
                    if($errors->has('price')){
                        echo '<span class=text-danger>'. $errors->first('price') . '</span>';
                    }
                @endphp
            </div>
        </div>
    </div>

    {{-- Img upload --}}
    <div class="form-group">
        <label for="profile_pic">Inserisci Immagine</label>
        <input class="form-control-file" type="file" name="profile_pic" value="" accept="image/*">
    </div>

    {{-- Indirizzo --}}
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="address">Indirizzo</label>
            <input type="text"  value="{{(isset($apartment)?$apartment->address:'')}}"  class="form-control {{($errors->has('address')?'is-invalid':'')}}" id="address" name="address" placeholder="Inserire l'indirizzo" required>
            @php
                if($errors->has('address')){
                    echo '<span class=text-danger>'. $errors->first('address') . '</span>';
                }
            @endphp
            <small class="form-text text-muted">Digita il tuo indirizzo</small>
        </div>
    </div>





    <div class="form-group">
        <div class="form-row">
            <div class="col-sm-10">
              <label class="switch">
                  <input type="checkbox" id="togBtn" name="visible" value="true"
                    @if (isset($apartment) && $apartment->visible === 'true')
                        checked
                    @endif>

                  <div class="slider round">
                      <!--ADDED HTML -->
                      <span class="on">Visibile</span>
                      <span class="off">Non visibile</span>
                      <!--END-->
                  </div>
              </label>
            </div>

        </div>
    </div>

    {{-- Submit --}}
    <div class="form-row">
        <div class="form-check col-md-12 text-right">
            <input type="submit" class="btn btn-boolbnb" value="Salva">
        </div>
    </div>
</form>

<!-- Id Field -->
{{--<div class="col-sm-6">--}}
{{--    {!! Form::label('id', 'Id:') !!}--}}
{{--    <p>{{ $aqar->id }}</p>--}}
{{--</div>--}}

<!-- Status Field -->
<div class="col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $aqar->getStatus() }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $aqar->slug }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $aqar->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $aqar->description }}</p>
</div>

<!-- Vip Field -->
<div class="col-sm-6">
    {!! Form::label('vip', 'Vip:') !!}
    <p>{{ $aqar->getVip() }}</p>
</div>

<!-- Finannce Bank Field -->
<div class="col-sm-6">
    {!! Form::label('finannce_bank', 'Finannce Bank:') !!}
    <p>{{ $aqar->finannce_bank  ? 'نعم' : 'لا'}}</p>
</div>

<!-- Licensed Field -->
<div class="col-sm-6">
    {!! Form::label('licensed', 'Licensed:') !!}
    <p>{{ $aqar->licensed ? 'نعم' : 'لا'}}</p>
</div>

<!-- Trade Field -->
<div class="col-sm-6">
    {!! Form::label('trade', 'Trade:') !!}
    <p>{{ $aqar->trade  ? 'نعم' : 'لا'}}</p>
</div>

<!-- Number Of Floors Field -->
<div class="col-sm-6">
    {!! Form::label('number_of_floors', 'Number Of Floors:') !!}
    <p>{{ $aqar->number_of_floors ?? 0 }}</p>
</div>

<!-- Total Area Field -->
<div class="col-sm-6">
    {!! Form::label('total_area', 'Total Area:') !!}
    <p>{{ $aqar->total_area }}</p>
</div>

<!-- Rooms Field -->
<div class="col-sm-6">
    {!! Form::label('rooms', 'Rooms:') !!}
    <p>{{ $aqar->rooms }}</p>
</div>

<!-- Baths Field -->
<div class="col-sm-6">
    {!! Form::label('baths', 'Baths:') !!}
    <p>{{ $aqar->baths }}</p>
</div>

<!-- Floor Field -->
<div class="col-sm-6">
    {!! Form::label('floor', 'Floor:') !!}
    <p>{{ $aqar->floor }}</p>
</div>

{{--<!-- Ground Area Field -->--}}
{{--<div class="col-sm-6">--}}
{{--    {!! Form::label('ground_area', 'Ground Area:') !!}--}}
{{--    <p>{{ $aqar->ground_area }}</p>--}}
{{--</div>--}}

{{--<!-- Land Area Field -->--}}
{{--<div class="col-sm-6">--}}
{{--    {!! Form::label('land_area', 'Land Area:') !!}--}}
{{--    <p>{{ $aqar->land_area }}</p>--}}
{{--</div>--}}

<!-- Downpayment Field -->
<div class="col-sm-6">
    {!! Form::label('downpayment', 'Downpayment:') !!}
    <p>{{ $aqar->downpayment ?? 0 }}</p>
</div>

<!-- Installment Time Field -->
<div class="col-sm-6">
    {!! Form::label('installment_time', 'Installment Time:') !!}
    <p>{{ $aqar->installment_time ?? 0}}</p>
</div>

<!-- Installment Value Field -->
<div class="col-sm-6">
    {!! Form::label('installment_value', 'Installment Value:') !!}
    <p>{{ $aqar->installment_value ?? 0}}</p>
</div>

<!-- Monthly Rent Field -->
<div class="col-sm-6">
    {!! Form::label('monthly_rent', 'Monthly Rent:') !!}
    <p>{{ $aqar->monthly_rent ?? 0 }}</p>
</div>

<!-- Rent Long Time Field -->
<div class="col-sm-6">
    {!! Form::label('rent_long_time', 'Rent Long Time:') !!}
    <p>{{ $aqar->rent_long_time ?? 0 }}</p>
</div>

<!-- Offer Type Field -->
<div class="col-sm-6">
    {!! Form::label('offer_type', 'Offer Type:') !!}
    <p>{{ $aqar->offertype->type_offer }}</p>
</div>

<!-- Property Type Field -->
<div class="col-sm-6">
    {!! Form::label('property_type', 'Property Type:') !!}
    <p>{{ $aqar->propertytype->property_type }}</p>
</div>

<!-- License Type Field -->
<div class="col-sm-6">
    {!! Form::label('license_type', 'License Type:') !!}
    <p>{{ $aqar->licensetype? $aqar->licensetype->license_type : 'لا يوجد' }}</p>
</div>

<!-- Mtr Price Field -->
<div class="col-sm-6">
    {!! Form::label('mtr_price', 'Mtr Price:') !!}
    <p>{{ $aqar->mtr_price ?? 0 }}</p>
</div>

<!-- Reciving Field -->
<div class="col-sm-6">
    {!! Form::label('reciving', 'Reciving:') !!}
    <p>{{ $aqar->reciving }}</p>
</div>

<!-- Rec Time Field -->
<div class="col-sm-6">
    {!! Form::label('rec_time', 'Rec Time:') !!}
    <p>{{ $aqar->rec_time ?? 0}}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $aqar->user->name }}</p>
</div>

<!-- Category Field -->
<div class="col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $aqar->category_rel->category_name }}</p>
</div>

{{--<!-- Location Field -->--}}
{{--<div class="col-sm-6">--}}
{{--    {!! Form::label('location', 'Location:') !!}--}}
{{--    <p>{{ $aqar->location }}</p>--}}
{{--</div>--}}

<!-- Call Id Field -->
<div class="col-sm-6">
    {!! Form::label('call_id', 'Call Id:') !!}
    <p>{{ $aqar->callTimes->call_time }}</p>
</div>

<!-- Endorsement Field -->
<div class="col-sm-6">
    {!! Form::label('endorsement', 'Endorsement:') !!}
    <p>{{ $aqar->endorsement ? 'نعم' : 'لا'}}</p>
</div>

<!-- Total Price Field -->
<div class="col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{{ $aqar->total_price }}</p>
</div>

<!-- Finishtype Field -->
<div class="col-sm-6">
    {!! Form::label('finishtype', 'Finishtype:') !!}
    <p>{{ $aqar->finishType->finish_type }}</p>
</div>

<!-- Governrate Id Field -->
<div class="col-sm-6">
    {!! Form::label('governrate_id', 'Governrate Id:') !!}
    <p>{{ $aqar->governrateq->governrate }}</p>
</div>

<!-- District Id Field -->
<div class="col-sm-6">
    {!! Form::label('district_id', 'District Id:') !!}
    <p>{{ $aqar->districte->district }}</p>
</div>

<!-- Area Id Field -->
<div class="col-sm-6">
    {!! Form::label('area_id', 'Area Id:') !!}
    <p>{{ $aqar->subAreaa? $aqar->subAreaa->area : 'لا يوجد' }}</p>
</div>

<!-- Compound Field -->
<div class="col-sm-6">
    {!! Form::label('compound', 'Compound:') !!}
    <p>{{ $aqar->compounds? $aqar->compounds->compound : 'لا يوجد'}}</p>
</div>

<!-- Points Avail Field -->
<div class="col-sm-6">
    {!! Form::label('points_avail', 'Points Avail:') !!}
    <p>{{ $aqar->points_avail }}</p>
</div>

<!-- Views Field -->
<div class="col-sm-6">
    {!! Form::label('views', 'Views:') !!}
    <p>{{ $aqar->views }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $aqar->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $aqar->updated_at }}</p>
</div>


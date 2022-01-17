<style type="text/css">
    .starrate span.ctrl { position:absolute; z-index:2;}
    .starrate { color:var(--secondary); cursor:pointer}
    .starrate.saved { color:var(--dark);}
    .starrate:hover { color:var(--primary);} 
    .starrate.saved:hover { color:var(--orange);}
</style>
<form method="post" action="{{route('sfeedback.store')}}" class="pt-width-p-80 my-0 mx-auto">
    @csrf
    <div class="mb-3">
        <label for="email" class="col-form-label p-0 mb-1">Tutor Name<span class="pt-color-red pt-fs-16">*</span> </label>
        <select name="booking_tutor_id">
            @foreach($booking_slot as $booking)
            <option value="{{$booking->id}}_{{$booking->tutor->id}}">{{$booking->tutor->first_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="col-form-label p-0 mb-1">description <span class="pt-color-red pt-fs-16">*</span> </label>
        <textarea class="form-control" name="description"></textarea> 
    </div>

    <div class="mb-3 py-2 bg-light border">
	    <div class="col-2 ml-auto">
	    	<input type="hidden" name="star" id="star" value="2.5">
	        <div id="starrate" class="starrate mt-3" data-val="2.5" data-max="5">
	            <span class="ctrl"></span>
	            <span class="cont m-1">
	            	<i class="fas fa-fw fa-star"></i> 
	            	<i class="fas fa-fw fa-star"></i> 
	            	<i class="fas fa-fw fa-star-half-alt"></i> 
	            	<i class="far fa-fw fa-star"></i> 
	           		<i class="far fa-fw fa-star"></i> 
	            </span>
	        </div>
	    </div>
	    <div id="test" class="col-3 mr-auto display-4">2.5</div>
	</div>
	<div>
        <button type="submit" class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">Add Feedback</button>
    </div>
</form>
<script type="text/javascript">
	
	var valueHover = 0;

    $(".starrate").on("click", function () {
        // alert("starrate click");
        $(this).data('val', valueHover);
        $(this).addClass('saved')
    });

    $(".starrate").on("mouseout", function () {
        // alert("mouseout");
        upStars($(this).data('val'));
    });

    $(".starrate span.ctrl").on("mousemove", function (e) {
         // alert("mousemove");
        var maxV = parseInt($(this).parent("div").data('max'))
        valueHover = Math.ceil(calcSliderPos(e, maxV) * 2) / 2;
        upStars(valueHover);
    });

    $(".starrate span.ctrl").width($(".starrate span.cont").width());
    $(".starrate span.ctrl").height($(".starrate span.cont").height());

    function calcSliderPos(e, maxV) {
	    return (e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
	}

	function upStars(val) {

	    var val = parseFloat(val);
	    $("#test").html(val.toFixed(1));
	    $("#starrate").attr('data-val',val.toFixed(1));
	    $("#star").val(val.toFixed(1));

	    var full = Number.isInteger(val);
	    val = parseInt(val);
	    var stars = $("#starrate i");

	    stars.slice(0, val).attr("class", "fas fa-fw fa-star");
	    if (!full) { 
	        stars.slice(val, val + 1).attr("class", "fas fa-fw fa-star-half-alt"); 
	        val++;
	    }
	    stars.slice(val, 5).attr("class", "far fa-fw fa-star");
	}
</script>
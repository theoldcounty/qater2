
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

var app = {
	getSelections(choices){
		var newData = Array();
		var that = this;

		$.each(that.data, function(i, v) {
			if (choices.indexOf(v.id) !== -1) {
				newData.push(v);
			}
		});

		return newData;
	},
	mapHandler: function(choices){
		//'.listingresults row'
		var data = this.getSelections(choices);
		//console.log("data", data);

		var locationArray = new Array();
		$.each(data, function(index, value) {
			locationArray.push(value.location);
		});
		//console.log("locationArray", locationArray);

		function mode(array)
		{
		    if(array.length == 0)
		        return null;
		    var modeMap = {};
		    var maxEl = array[0], maxCount = 1;
		    for(var i = 0; i < array.length; i++)
		    {
		        var el = array[i];
		        if(modeMap[el] == null)
		            modeMap[el] = 1;
		        else
		            modeMap[el]++;  
		        if(modeMap[el] > maxCount)
		        {
		            maxEl = el;
		            maxCount = modeMap[el];
		        }
		    }
		    return maxEl;
		}

		var topChoice = mode(locationArray);
		//console.log("topChoice", topChoice);

		
		//marker holder
		var markerHolder = $('.markerholder');
		var	markerTemplate = markerHolder.find('.marker').eq(0).clone(true);

		//empty old dom
		markerHolder.empty();
		$.each(data, function(key, value) {
			$(markerTemplate).find('.coverimg img').attr("src", "assets/images/assets/square/"+value["id"]+".jpg");
			$(markerTemplate).find('[data-type="curve"]').text(value["shortdescription"]);

			//markerTemplate
			markerHolder.append('<div class="marker" data-type="markers" data-size="'+value["markerSize"]+'" data-pos-x="'+value["posx"]+'%" data-pos-y="'+value["posy"]+'%" data-id="'+value["id"]+'">'+$(markerTemplate).html()+'</div>');
		});

			var lang = $('body').data("lang");

			var textForLondon = "Fly out from London";
			if(lang != "en"){
				textForLondon = "رحلات الطيران إلى الخارج من لندن";
			}

			if(topChoice == "London"){
				textForLondon = "Fly to and from London";
				if(lang != "en"){
					textForLondon = "رحلات الطيران إلى لندن ومنها";
				}
			}

			//london marker
			$(markerTemplate).find('.coverimg').remove();
			$(markerTemplate).find('[data-type="curve"]').text(textForLondon);
			$(markerTemplate).find('img.markerpointer').attr("src", "assets/images/marker-info.png");
			markerHolder.append('<div class="marker info" data-type="markers" data-size="small" data-pos-x="75%" data-pos-y="60%" data-id="x">'+$(markerTemplate).html()+'</div>');
		
			var locales = [
					{
						"location" : "Birmingham",
						"arabic" : "برمنجهام",
						"posx" : "57%",
						"posy" : "51%"
					},
					{
						"location" : "Edingburgh",
						"arabic" : "دنبره",
						"posx" : "41%",
						"posy" : "9%"
					},
					{
						"location" : "Manchester",
						"arabic" : "مانشستر",
						"posx" : "56%",
						"posy" : "40%"
					},
					{
						"location" : "London",
						"arabic" : "لندن",
						"posx" : "75%",
						"posy" : "60%"
					}
				];		

				var selection = "";
				$.each(locales, function(key, value) {
					if(value.location == topChoice){
						selection = value;
					}
				});
				//console.log("selection", selection);
				
				if(topChoice != "London"){		
					var flyIntoText = "Fly into";
					if(lang != "en"){
						flyIntoText = "رحلة الطيران إلى";
							//console.log("topChoice", topChoice);
							//console.log("selection", selection);
						topChoice = selection["arabic"];
						//console.log("topChoice", topChoice);
					}

					//other marker
					$(markerTemplate).find('.coverimg').remove();
					$(markerTemplate).find('[data-type="curve"]').text(flyIntoText + " " + topChoice);
					$(markerTemplate).find('img.markerpointer').attr("src", "assets/images/marker-info.png");
					markerHolder.append('<div class="marker info" data-type="markers" data-size="small" data-pos-x="'+selection["posx"]+'" data-pos-y="'+selection["posy"]+'" data-id="x">'+$(markerTemplate).html()+'</div>');
				}

				//inbound
				$('.listingresults .inbound').text(topChoice);


		//listing holder
		var listingHolder = $('.listingresults .list');
		var	rowTemplate = listingHolder.find('.row').eq(0).clone(true);
	
		//empty old dom
		listingHolder.empty();

		$.each(data, function(key, value) {
			$(rowTemplate).find('.imgwrap img').attr("src", "assets/images/assets/landscape/"+value["id"]+".jpg");
			$(rowTemplate).find('h4').text(value["description"]);
			$(rowTemplate).find('p').text(value["fulldescription"]);

			//console.log("value", value);
			//rowTemplate
			listingHolder.append('<div class="row">'+$(rowTemplate).html()+'</div>');
		});

		var markers = new Array();
		$('[data-type="markers"]').each(function(index) {
			$(this).addClass($(this).data("size"));
			//$(this).css("left", $(this).data("pos-x")).css("top", $(this).data("pos-y")).css("z-index", index);
			$(this).css("left", $(this).data("pos-x")).css("top", $(this).data("pos-y")).css("z-index", parseInt($(this).data("pos-y"), 10));
		});

		//if y pos is low e.g. 9 -- and has a zindex 2 -- and another market near has a higher y pos 15 and a lower index 1 -- readjust

		function getRandomNumber(s, e){
			return Math.floor(Math.random() * e) + s;
		}

		function curveme(el,index){

			var content = $(el).text();
			$(el).empty();

			var markerPointerSize = $(el).parent().find('.markerpointer').width();
			
			var diameter = markerPointerSize+32;

			//var diameter = 195;//large
			//var diameter = 125;//small
			radius = diameter/2;

			//Create the SVG
			var svg = d3.select(el).append("svg")
					.attr("width", diameter)
					.attr("height", diameter);

			var pi = Math.PI;

			var arc = d3.arc()
				    .innerRadius(radius-20)
				    .outerRadius(radius-15)
				    .startAngle(getRandomNumber(-1, 0.5))
				    .endAngle(pi);
						
			//Create an SVG path			
			svg.append("path")
				.attr("id", "wavy"+index) //very important to give the path element a unique ID to reference later
				.attr("d", arc)
				.attr("transform", "translate("+radius+","+radius+")")
				.style("fill", "none");

			//Create an SVG text element and append a textPath element
			svg.append("text")
			   .append("textPath") //append a textPath to the text element
				.attr("xlink:href", "#wavy"+index) //place the ID of the path here
				.style("text-anchor","right") //place the text right on the arc
				.attr("startOffset", "0")		
				.text(content);
		}

		$('[data-type="curve"]').each(function(index) {
			curveme(this, index);
		});
	},
	count:0,
	bindEvents: function(){
		var that = this;
		$('[data-type="select"]').each(function(index) {
			$(this).select2();
		});

		this.packers = new Array();
		$('[data-type="packery"]').each(function(index) {
			var pckry = new Packery(this, {
				itemSelector: '.grid-item',
				gutter: 10
			});
			that.packers.push(pckry);
		});

		this.swipers = new Array();
		$('[data-type="swiper"]').each(function(index) {
			var mySwiper = new Swiper (this, {
				// Optional parameters
				direction: 'horizontal',
				// Navigation arrows

			    spaceBetween: 50,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev'
		    });
		    that.swipers.push(mySwiper);
		});

		$(".grid-item").click(function() {
			var isUnselected = $(this).hasClass("unselected");

			var simulation = that.count + 1;
			if(!isUnselected){
				simulation = that.count - 1;
			}

			if(simulation > 5){
				$('.selection .error').fadeIn();
			}else{
				$('.selection .error').fadeOut();
			}

			if(simulation > 5){
				return false;
			}

		  if(isUnselected){
		  	//remove unselected class -- add selected class
			$(this).removeClass("unselected").addClass("selected");
			$(this).find("input[type='checkbox']").prop('checked', true);
			that.count++;
		  }else{
		  	//remove selected class -- add unselected class
			$(this).removeClass("selected").addClass("unselected");
			$(this).find("input[type='checkbox']").prop('checked', false);
			that.count--;
		  }

		  $('.selection .count').text(that.count);
		});

	},
	getItems: function(callback){
		//ar or en
		var api = "Api/getListings/"+this.lang;
		$.getJSON(api, function(data) {
			callback(data);
		});
	},
	registerUser: function(data){
		data["sessionId"] = this.sessionId;

		var dataType = "string";

		var url = "Api/registerUser/";
		$.ajax({
		  type: "POST",
		  url: url,
		  data: data,
		  success: function(msg){
		  	console.log("msg", msg);
		  },
		  dataType: dataType
		});
	},
	populateSelection: function(data){		
		//store data
		this.data = data["listings"];

		var swiperHolder = $('.selectionform .swiper-wrapper');

		/*
		var $elem = swiperHolder.find('.swiper-slide').eq(0).empty();
		    sldeTemplate = $elem.clone(true);
			console.log("sldeTemplate", sldeTemplate);

		var gridHolder = $('.selectionform .grid2')
		var $elem = gridHolder.find('.grid-item').eq(0).empty();
			gridTemplate = $elem.clone(true);
			console.log("gridTemplate", gridTemplate);

		console.log("gridHolder", gridHolder);
		console.log("data", data);

		//grid empty
		gridHolder.empty();
		*/

		//empty the swiper
		swiperHolder.empty();
	  
			$.each(data["listings"], function(key, val) {
				//console.log("key", key);
				swiperHolder.append('<div class="grid-item unselected"><div class="tickholder"></div><div class="textholder">'+val.description+'</div><input type="checkbox" class="ids" name="items[]" value="'+val.id+'"><img src="assets/images/assets/landscape/'+val.id+'.jpg"/></div>');			
			});

			var a = $('.selectionform .swiper-wrapper > div');

			for( var i = 0; i < a.length; i+=9 ) {
			    a.slice(i, i+9).wrapAll('<div class="swiper-slide"><div class="grid2" data-type="packery"></div></div>');
			}
	},
	init: function(){
		var that = this;

		//set language
		this.lang = $("body").data("lang");

		//get session
		this.sessionId = $("body").data("session");

		if(this.lang == "ar"){
			//swap to arabic text

			$('[data-ar]').each(function(index) {
				var arabicText = $(this).data("ar");
				$(this).text(arabicText);
				$(this).val(arabicText);
			});

			$('img[data-ar]').each(function(index) {
				var arabicText = $(this).data("ar");
				$(this).attr("src",arabicText);
			});
			
			/*
			$('.twitter-share-button').each(function(index) {
				var arabicText = $(this).data("ar");
				$(this).data("text",arabicText);
			});

			$('meta[data-ar]').each(function(index) {
				var arabicText = $(this).data("ar");
				$(this).attr("content",arabicText);
			});*/
		}

		that.togglePage("#page1");

		this.validateForm1(function(data){
			that.registerUser(data);

			that.togglePage("#page2");
			that.getItems(function(d){
				that.populateSelection(d);
				that.bindEvents();
			});
			
			$("#selectionForm").submit(function(event){
				event.preventDefault();

				var data = JSON.parse(JSON.stringify($(this).serializeObject()));
				
				var items = data["items[]"];

				if(items.length < 5){
					alert("Please choose 5");
					return false;
				}

				delete data["items[]"];

				data["items"] = items.join();
				that.registerUser(data);
				
				var choices = $('.ids:checked').map(function(){ 
					// return the value, which would be the collection element
					return this.value; 
					// get it as an array
				}).get();

				$('.flyingfrom').text(data["flyingFrom"]);
				$('.listingresults .outbound').text(data["flyingFrom"]);

				that.togglePage("#page3");
				that.mapHandler(choices);
			});
		})
	},
	validateForm1: function(callback){
		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstName: "required",
				surname: "required",
				email: {
					required: true,
					email: true
				},
				terms: "required"/*
				termsBT: "required",
				termsQAT: "required"*/
			},
			messages: {
				firstName: "Please enter your firstname",
				surname: "Please enter your lastname",
				email: "Please enter a valid email address",
				terms: "Please agree to Visit Britain and Qatar Airways Terms"/*
				termsBT: "Please agree to the Visit Britain Terms",
				termsQAT: "Please agree to the Qatar Terms"*/
			},
			submitHandler: function(form) {			    
			    var data = JSON.parse(JSON.stringify($(form).serializeObject()));
			    
			    delete data["terms"];

				//delete data["termsBT"];
				//delete data["termsQAT"];

			    //console.log("data", data);
				callback(data);
			}
		});
	},
	fireEvent: function(page){
		switch(page) {
		    case "#page1":
		        //
				//Activity name of this tag: IPRO - VB - Discover Britain - Home Page
				var axel = Math.random() + "";
				var a = axel * 10000000000000;
				$('body').append('<img src="https://ad.doubleclick.net/ddm/activity/src=2673654;type=visibrit;cat=vbdisbhp;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" alt=""/>');
				
				$('body').append('<img src="https://ads.undertone.com/t?trackerid=6183&cb=[INSERT_YOUR_CACHE-BUSTER_HERE]" style="display: none;" width="0" height="0" alt="" />');

				break;		        
		    case "#page2":
		        //
				//Activity name of this tag: IPRO - VB - Discover Britain - Game Page
				var axel = Math.random() + "";
				var a = axel * 10000000000000;
				$('body').append('<img src="https://ad.doubleclick.net/ddm/activity/src=2673654;type=visibrit;cat=vbdisbgp;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" alt=""/>');
				
				$('body').append('<img src="http://inflectomtrack.net/p.ashx?o=1690&e=263&f=img&t=TRANSACTION_ID" width="1" height="1" border="0" />');
		        $('body').append('<img src="http://inflectomtrack.net/p.ashx?o=1691&e=263&f=img&t=TRANSACTION_ID" width="1" height="1" border="0" />');
		        $('body').append('<img src="http://inflectomtrack.net/p.ashx?o=1692&e=263&f=img&t=TRANSACTION_ID" width="1" height="1" border="0" />');
		        
		        break;
		    case "#page3":
		        //
				//Activity name of this tag: IPRO - VB - Discover Britain - Sign Up Page
				var axel = Math.random() + "";
				var a = axel * 10000000000000;
				$('body').append('<img src="https://ad.doubleclick.net/ddm/activity/src=2673654;type=visibrit;cat=vbdisbsu;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" alt=""/>');
				break;
		}
	},
	togglePage: function(page){
		this.fireEvent(page);
		$(".pages").hide();
		$(page).fadeIn(400);
	}
};

$(document).ready(function() {
	app.init();
});
<script>



	$(document).on('keyup','.search_string', function () {

		var str=this.value;

		if(str.length>0){

			$(".searchButton").attr("disabled", false);

		} else{

			$(".searchButton").attr("disabled", true);

		}

	

	});

	

	$(document).on('change','.daterange', function () {

		var str=this.value;

		if(str.length>0){

			$(".searchButton").attr("disabled", false);

		} else{

			$(".searchButton").attr("disabled", true);

		}

	

	});

	

	$(document).on('change','.status', function () {

		var str=this.value;

		if(str.length>0){

			$(".searchButton").attr("disabled", false);

		} else{

			$(".searchButton").attr("disabled", true);

		}

	

	});

	

	$(document).on('change','.isOtpVerified', function () {

		var str=this.value;

		if(str.length>0){

			$(".searchButton").attr("disabled", false);

		} else{

			$(".searchButton").attr("disabled", true);

		}

	

	});

	

	

		$(".payment_history").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	   

						  var searchString=$('.search_string').val();

						var daterange=$('.daterange').val();

                  

                    if(daterange==''){

							daterange='All';   

                    }  else{

							var res = daterange.split("/");

							var daterange=res[0]+"."+res[1];

					}

					if(searchString==''){

                        searchString='All';   

                    }

                        

                  currentPath+="/"+searchString+"/"+daterange;

			      window.location.replace(currentPath);

                    

        	});

		$(".ledgerDetails").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	   

						

						var daterange=$('.daterange').val();

                  

                    if(daterange==''){

							daterange='All';   

                    }  else{

							var res = daterange.split("/");

							var daterange=res[0]+"."+res[1];

					}

				

                        

                  currentPath+="/"+daterange;

			      window.location.replace(currentPath);

                    

        	});

        	

	$(".vendorLedger").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	   

						  var searchString=$('.searchString').val();

						var daterange=$('.daterange').val();

                  

                    if(daterange==''){

							daterange='All';   

                    }  else{

							var res = daterange.split("/");

							var daterange=res[0]+"."+res[1];

					}

					if(searchString==''){

                        searchString='All';   

                    }

                        

                  currentPath+="/"+searchString+"/"+daterange;

			      window.location.replace(currentPath);

                    

        	});

	$(document).on('keyup','.size2', function () {

	

		if (this.value.match(/[^0-9\-]/g)) {

			var value = this.value.replace(/[^0-9 \-]/g, '');

			  this.value=value.replace(/\s+/g, '');

			

			

		}

	});

	

		$(document).on('change','.ProductBlocked', function () {

		    var ProductBlocked=$('#ProductBlocked').val();

   

       var selectedBrands = $('#brands').val();

	    var selectedBrandsString = selectedBrands.toString();

	    

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

        var Productvendor=$('#ProductVendor').val();

        

        if(Productvendor==''){

         Productvendor='All';   

        }

        var ProductSts=$('.ProductStatus').val();

        var ProductString=$('.ProductSearchString').val();

         var ProductCategory=$('.category_id').val();

        var ProductType=$('.ProductType').val();

        if(ProductString==''){

         ProductString='All';   

        }

        

        if(ProductSts==''){

         ProductSts='All';   

        }

          var ProductCategory=$('.category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

	

	filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked);

		});

	$(document).on('change','.category_id', function () {



   var ProductBlocked=$('#ProductBlocked').val();

   

       var selectedBrands = $('#brands').val();

	    var selectedBrandsString = selectedBrands.toString();

	    

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

        var Productvendor=$('#ProductVendor').val();

        

        if(Productvendor==''){

         Productvendor='All';   

        }

        var ProductSts=$('.ProductStatus').val();

        var ProductString=$('.ProductSearchString').val();

         var ProductCategory=$('.category_id').val();

        var ProductType=$('.ProductType').val();

        if(ProductString==''){

         ProductString='All';   

        }

        

        if(ProductSts==''){

         ProductSts='All';   

        }

          var ProductCategory=$('.category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

	

	filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked);

	});

	$(document).on('change','.fdProductVendor', function () {

  var ProductBlocked=$('#ProductBlocked').val();

      var Productvendor=$('#ProductVendor').val();

        

        if(Productvendor==''){

         Productvendor='All';   

        }

        

        var selectedBrands = $('#brands').val();

	    var selectedBrandsString = selectedBrands.toString();

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

        var ProductSts=$('.ProductStatus').val();

        var ProductString=$('.ProductSearchString').val();

        var ProductType=$('.ProductType').val();

         var ProductCategory=$('.category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

        if(ProductSts==''){

         ProductSts='All';   

        }

        if(ProductString==''){

         ProductString='All';   

        }

	

filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked);

	});

		$(document).on('change','.ProductStatus', function () {

		    

		      var ProductBlocked=$('#ProductBlocked').val();

		    var selectedBrands = $('#brands').val();

	    var selectedBrandsString = selectedBrands.toString();

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

           var Productvendor=$('#ProductVendor').val();

            

            if(Productvendor==''){

         Productvendor='All';   

        }

            var ProductSts=this.value;

            var ProductString=$('.ProductSearchString').val();

            var ProductType=$('.ProductType').val();

            

             var ProductCategory=$('.category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

        

        if(ProductString==''){

         ProductString='All';   

        }

if(ProductSts==''){

         ProductSts='All';   

        }

	

	filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked);

	});

		$(document).on('change','.ProductType', function () {

		    

		      var ProductBlocked=$('#ProductBlocked').val();

		    var selectedBrands = $('#brands').val();

	    var selectedBrandsString = selectedBrands.toString();

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

           var Productvendor=$('#ProductVendor').val();

            

            if(Productvendor==''){

         Productvendor='All';   

        }

            var ProductSts=$('.ProductStatus').val();

            var ProductString=$('.ProductSearchString').val();

              var ProductType=$('.ProductType').val();

              

               var ProductCategory=$('.category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

        if(ProductSts==''){

         ProductSts='All';   

        }

        if(ProductString==''){

         ProductString='All';   

        }



	

	filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked);

	});

	

	$(document).on('click','.ProductSearch', function () {

	      var ProductBlocked=$('#ProductBlocked').val();

	    var selectedBrands = $('#brands').val();

	    var selectedBrandsString = selectedBrands.toString();

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

	    

	   var Productvendor=$('#ProductVendor').val();

	    

	     if(Productvendor==''){

         Productvendor='All';   

        }

           var ProductSts=$('.ProductStatus').val();

            var ProductString=$('.ProductSearchString').val();

              var ProductType=$('.ProductType').val();

              

               var ProductCategory=$('.category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

        if(ProductSts==''){

         ProductSts='All';   

        }

        if(ProductString==''){

         ProductString='All';   

        }

        	filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked);

	});

	

	function filterProduct(Productvendor,ProductSts,ProductString,ProductType,ProductCategory,selectedBrandsString,ProductBlocked){

	    var url='{{@$page_details['search_route']}}';

	    url=url+"/"+Productvendor+"/"+ProductSts+"/"+ProductString+"/"+ProductType+"/"+ProductCategory+"/"+selectedBrandsString+"/"+ProductBlocked;

	   

	    window.location.href=url;

	}

	

		$(document).on('click','.needToblockAndUnblock', function () {

		    var blockProductId=$(this).attr("blockProductId");

		    var blockedproductMode=$(this).attr("blockedproductMode");

		    $('#blockProductId').val(blockProductId);

		     $('#blockedproductMode').val(blockedproductMode);

		});

		$(document).on('click','.showcategorySizes', function () {

		var cat_id=$(this).attr("cat_id");

			$.ajax({

				method: "get",

				async:false,

					url : '{{URL::to('admin/getCategoryAttributes')}}',

				data: {

					cat_id: cat_id,

					attributesType:1

				}

			})

			.done(function( res ) {

					var myObj = JSON.parse(res);

					$('.attributesResponseData').html(myObj.html);

					$('#attributesModal').modal('show');

			});

	});

	$(document).on('click','.showcategoryColors', function () {

			var cat_id=$(this).attr("cat_id");

			$.ajax({

				method: "get",

				async:false,

					url : '{{URL::to('admin/getCategoryAttributes')}}',

				data: {

					cat_id: cat_id,

					attributesType:0

				}

			})

			.done(function( res ) {

					var myObj = JSON.parse(res);

					$('.attributesResponseData').html(myObj.html);

					$('#attributesModal').modal('show');

			});

			

		

			

	});

	

	

	

 $(function () {

        $(".check_all").click(function () {

			 $(".multiple_select_checkBox").prop('checked', $(this).prop('checked'));

			 isCheckboxchecked();

        });

		

		$(".multiple_select_checkBox").click(function () {

			 isCheckboxchecked();

        });

		$(".btnSubmitTrigger").click(function () {

				$(".multi_delete_form").submit();

        });

        

        	$(".addtooffer").click(function () {

				$(".addtooffer").submit();

        });

        

        	$(".AllOrderFilter").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	  

        	   

                    var str=$('.search_string').val();

                    var daterange=$('.daterange').val();

                    var vendororder=$('.vendororder').val();

                  

                   

                    if(daterange==''){

                        daterange='All';   

                    } else{

                        var res = daterange.split("/");

                        var daterange=res[0]+"."+res[1];

                    }

                     if(str==''){

                        str='All';   

                    }

                    

                     var selectedBrands = $('#orderBrandId').val();

	    var selectedBrandsString = selectedBrands.toString();

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

		

		

		   var ProductCategory=$('#order_category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

        }

                    

                  currentPath+="/"+str+"/"+daterange+"/"+vendororder+"/"+selectedBrandsString+"/"+ProductCategory;

			      window.location.replace(currentPath);

                    

        	});

        	

        		$(".sOrdersearch").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	  

        	   

                    var str=$('.search_string').val();

                    var daterange=$('.daterange').val();

                    var vendororder=$('.vendororder').val();

                  

                   

                    if(daterange==''){

                        daterange='All';   

                    } else{

                        var res = daterange.split("/");

                        var daterange=res[0]+"."+res[1];

                    }

                     if(str!=''){

                        str=str;   

                    }else{

                      

                       str='All';   

                    }

                    

                   /*  var selectedBrands = $('#orderBrandId').val();

	    var selectedBrandsString = selectedBrands.toString();

	    if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

		

		

		   var ProductCategory=$('#order_category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

         

        }*/

                  

                 var ProductCategory='All';  var selectedBrandsString='All';  //+"/"+selectedBrandsString+"/"+ProductCategory

                    

                  currentPath+="/"+str+"/"+daterange+"/"+ProductCategory;

			      window.location.replace(currentPath);

                    

        	});

        	

        		$(".Customer_payment_history").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	       var daterange=$('.daterange').val();

                 

                  

                    if(daterange==''){

                        daterange='All';   

                    } else{

                        var res = daterange.split("/");

                        var daterange=res[0]+"."+res[1];

                    }

                    

                  currentPath+="/"+daterange;

			      window.location.replace(currentPath);

                    

        	});

        		$(".reportFilter").click(function () {

        		

        	    var currentPath="{{@$page_details['search_route']}}";

        	   

                 

                    var daterange=$('.daterange').val();

                     var category_id=$('.category_id').val();

                        if(category_id==''){

                        category_id='0';   

                        }

                  

                    if(daterange==''){

                        daterange='All';   

                    } else{

                        var res = daterange.split("/");

                        var daterange=res[0]+"."+res[1];

                    }

                        

                  currentPath+="/"+daterange+"/"+category_id;

			      window.location.replace(currentPath);

                    

        	});

		

		$(".searchButton").click(function () {

				var str=$('.search_string').val();

				var daterange=$('.daterange').val();

				var status=$('.status').val();

				

				var path,mid_path;

				var currentPath="{{@$page_details['search_route']}}";

				console.log(currentPath);

			

				

				if (currentPath.indexOf("order_search") >= 0) {

					path = currentPath.split('order_search'); 

					path1 = path[0]+"order_search"+path[1];

					mid_path="order_search";

				}else if (currentPath.indexOf("customers_search") >= 0) {

					path = currentPath.split('customers_search'); 

					path1 = path[0]+"customers_search";

					mid_path="customers_search";

				}else if (currentPath.indexOf("customer_orders_search") >= 0) {

					path = currentPath.split('customer_orders_search'); 

					path1 = path[0]+"customer_orders_search"+path[1];

					mid_path="customer_orders_search";

				}else if (currentPath.indexOf("subscriber_search") >= 0) {

					path = currentPath.split('subscriber_search'); 

					path1 = path[0]+"subscriber_search"+path[1];

					mid_path="subscriber_search";

				}else if (currentPath.indexOf("vendor_search") >= 0) {

					path = currentPath.split('vendor_search'); 

					path1 = path[0]+"vendor_search"+path[1];

					mid_path="vendor_search";

				}else if (currentPath.indexOf("cat_search") >= 0) {

					path = currentPath.split('cat_search'); 

					path1 = path[0]+"cat_search"+path[1];

					mid_path="cat_search";

				}else if (currentPath.indexOf("brand_search") >= 0) {

					path = currentPath.split('brand_search'); 

					path1 = path[0]+"brand_search"+path[1];

					mid_path="brand_search";

				}else if (currentPath.indexOf("vendor_pincode_search") >= 0) {

					path = currentPath.split('vendor_pincode_search'); 

					path1 = path[0]+"vendor_pincode_search"+path[1];

					mid_path="vendor_pincode_search";

				}else if (currentPath.indexOf("logistics_search") >= 0) {

					path = currentPath.split('logistics_search'); 

					path1 = path[0]+"logistics_search"+path[1];

					mid_path="logistics_search";

				}else if (currentPath.indexOf("color_search") >= 0) {

					path = currentPath.split('color_search'); 

					path1 = path[0]+"color_search"+path[1];

					mid_path="color_search";

				}else if (currentPath.indexOf("size_search") >= 0) {

					path = currentPath.split('size_search'); 

					path1 = path[0]+"size_search"+path[1];

					mid_path="size_search";

				}else if (currentPath.indexOf("material_search") >= 0) {

					path = currentPath.split('material_search'); 

					path1 = path[0]+"material_search"+path[1];

					mid_path="material_search";

				}else if (currentPath.indexOf("filter_search") >= 0) {

					path = currentPath.split('filter_search'); 

					path1 = path[0]+"filter_search"+path[1];

					mid_path="filter_search";

				}else if (currentPath.indexOf("ledger_search") >= 0) {

					path = currentPath.split('ledger_search'); 

					path1 = path[0]+"ledger_search"+path[1];

					mid_path="ledger_search";

				}else if (currentPath.indexOf("ledger_detail_search") >= 0) {

					path = currentPath.split('ledger_detail_search'); 

					path1 = path[0]+"ledger_detail_search"+path[1];

					mid_path="ledger_detail_search";

				}else if (currentPath.indexOf("vendor_payment_search") >= 0) {

					path = currentPath.split('vendor_payment_search'); 

					path1 = path[0]+"vendor_payment_search"+path[1];

					mid_path="vendor_payment_search";

				}else if (currentPath.indexOf("blog_search") >= 0) {

					path = currentPath.split('blog_search'); 

					path1 = path[0]+"blog_search"+path[1];

					mid_path="blog_search";

				}else if (currentPath.indexOf("testimonial_search") >= 0) {

					path = currentPath.split('testimonial_search'); 

					path1 = path[0]+"testimonial_search"+path[1];

					mid_path="testimonial_search";

				}else if (currentPath.indexOf("vendor_orders_search") >= 0) {

					path = currentPath.split('vendor_orders_search'); 

					path1 = path[0]+"vendor_orders_search"+path[1];

					mid_path="vendor_orders_search";

				}

				else if (currentPath.indexOf("weddingenquiry_search") >= 0) {

					path = currentPath.split('weddingenquiry_search'); 

					path1 = path[0]+"weddingenquiry_search"+path[1];

					mid_path="weddingenquiry_search";

				}

				

					console.log(path1);

				if(daterange!='' && daterange!=undefined && str!=''){

					daterange = daterange.replace("/", "--");

					daterange="/"+daterange;

					str="/"+str;

					path1 = path[0]+mid_path+path[1]; ; 

					

				}else if(daterange!='' && daterange!=undefined){

					daterange = daterange.replace("/", "--");

					daterange="/"+daterange;

					path1 = path[0]+mid_path+"_date"+path[1]; 

					str="";

					

				}else if(str!='' && status!=''){

					str="/"+str;

					status="/"+status;

					//path1 = path[0]+mid_path+"_str"+path[1];

					daterange="";					

				}else if(str!=''){

					str="/"+str;

					if (currentPath.indexOf("customers_search") >= 0) {

					    	var status=$('.status').val();

					    	daterange="";

					} else{

                        path1 = path[0]+mid_path+"_str"+path[1];

                        daterange=""; 

					}

				

					

				}else if(status!=''){

					status="/"+status;

					//path1 = path[0]+mid_path+"_str"+path[1];

					str="/all";	

					daterange="";						

				}

				

				$url=path1+str+daterange+status;

                   

				

				if(mid_path=="customers_search")

				{

					var str=$('.search_string').val();

					var status=$('.status').val();

					var isOtpVerified=$('.isOtpVerified').val();

				

					if(str!='' && status!='' && isOtpVerified!=''){

						str="/"+str;

						daterange="";

						status="/"+status;

						isOtpVerified="/"+isOtpVerified;						

					}else if(str!='' && status!=''){

						str="/"+str;

						daterange="";

						status="/"+status;

						isOtpVerified="/all";						

					}else if(status!='' && isOtpVerified!=''){

						str="/all";

						daterange="";

						status="/"+status;

						isOtpVerified="/"+isOtpVerified;						

					}else if(str!=''){

						str="/"+str;

						daterange="";

						status="/all";

						isOtpVerified="/all";						

					}else if(status!=''){

						status="/"+status;

						str="/all";

						isOtpVerified="/all";						

						daterange="";						

					}else if(isOtpVerified!=''){

						isOtpVerified="/"+isOtpVerified;

						str="/all";	

						status="/all";	

						daterange="";						

					}

					var customers_row=$('.customers_row').val();

					if(customers_row==''){

					   	customers_row="all"; 

					}

					$url=path1+str+daterange+status+isOtpVerified+"/"+customers_row;

				}

				

				

				if(mid_path=="customer_orders_search")

				{

					var str=$('.search_string').val();

					var daterange=$('.daterange').val();

				

					if(daterange!='' && daterange!=undefined && str!=''){

						daterange = daterange.replace("/", "--");

						daterange="/"+daterange;

						str="/"+str;

						//path1 = path[0]+mid_path+path[1]; ; 

					}else if(daterange!='' && daterange!=undefined){

						daterange = daterange.replace("/", "--");

						daterange="/"+daterange;

						//path1 = path[0]+mid_path+"_date"+path[1]; 

						str="/all";

					}else if(str!=''){

						str="/"+str;

						daterange="/all";

					}

					path1 = path[0]+"customer_orders_search"+path[1];

					$url=path1+str+daterange;	

				}

				

				if(mid_path=="vendor_orders_search")

				{

					var str=$('.search_string').val();

					var daterange=$('.daterange').val();

				

					if(daterange!='' && daterange!=undefined && str!=''){

						daterange = daterange.replace("/", "--");

						daterange="/"+daterange;

						str="/"+str;

						//path1 = path[0]+mid_path+path[1]; ; 

					}else if(daterange!='' && daterange!=undefined){

						daterange = daterange.replace("/", "--");

						daterange="/"+daterange;

						//path1 = path[0]+mid_path+"_date"+path[1]; 

						str="/all";

					}else if(str!=''){

						str="/"+str;

						daterange="/all";

					}

					path1 = path[0]+"vendor_orders_search"+path[1];

					$url=path1+str+daterange;	

				}

				

				window.location.replace($url);

        });

		

		$(".reset").click(function () {

				$url="{{@$page_details['reset_route']}}";

				window.location.replace($url);

        });

		

    });

	

	function  isCheckboxchecked(){

		

		var countChk = $('.multiple_select_checkBox:checked').length;

		var checkProduct=[];

		if(countChk>0){

			$('.product_id').val('');

			$('input:checkbox.checkedProduct').each(function () {

				if(this.checked){

					checkProduct.push($(this).val());

				}

			});

			$(".commonClassDisableButton").attr("disabled", false);

			var checked = checkProduct.toString();

			$('.product_id').val(checked);

		} else{

			$('.product_id').val('');

			$(".commonClassDisableButton").attr("disabled", true);	

		}

	



		}

		

		

		

	



	</script>
$("#search-button").on("click", function () {
	// alert($("#courier_input").val());

	$("#load_button").css("display", "block");
	$("#search-button").css("display", "none");

	$.ajax({
		url: "https://api.binderbyte.com/v1/track?api_key=e22c362b529459e3ed8c136b86242fe11058337adc459ae3d55431d877751f87",
		type: "get",
		dataType: "json",
		data: {
			courier: $("#courier_input").val(),
			awb: $("#awb_input").val(),
		},

		success: function (result) {
			$("#load_button").css("display", "none");
			$("#search-button").css("display", "block");
			if (result.status == 200) {
				let resi = result.data;
				console.log(resi);

				$("#resi-status").html(
					`
				<div class="col-lg-12 mt-2">
				<div><h5>` +
						"STATUS PENGIRIMAN" +
						`</h5></div>
				<table class="table table-bordered">
				<tbody>
					<tr>
					<th scope="row">` +
						"STATUS" +
						`</th>
					<td>` +
						resi.summary.status +
						`</td>
					</tr>
					<tr>
					<tr>
					<th scope="row">` +
						"Kurir" +
						`</th>
					<td>` +
						resi.summary.courier +
						`</td>
					</tr>
					<th scope="row">` +
						"LAYANAN" +
						`</th>
					<td>` +
						resi.summary.service +
						`</td>
					</tr>
					<tr>
					<th scope="row">` +
						"PENGIRIM" +
						`</th>
					<td>` +
						resi.detail.shipper +
						`</td>
					</tr>
					<tr>
					<th scope="row">` +
						"ASAL" +
						`</th>
					<td>` +
						resi.detail.origin +
						`</td>
					</tr>
					<tr>
					<th scope="row">` +
						"PENERIMA" +
						`</th>
					<td>` +
						resi.detail.receiver +
						`</td>
					</tr>
					<tr>
					<th scope="row">` +
						"TUJUAN" +
						`</th>
					<td>` +
						resi.detail.destination +
						`</td>
					</tr>
				</tbody>
				</table>
				</div>
				`
				);

				var html = `<div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div id="tracking-pre"></div>
                            <div id="tracking">
                                <div class="text-center tracking-status-intransit">
                                    <p class="tracking-status text-tight" style="color: #893D39;font-weight: bold;">
                                        Track Info</p>
                                </div>
                                <div class="tracking-list">`;

				for (i = 0; i < resi.history.length; i++) {
					// alert(resi.history[i].desc); //ok
					const date = new Date(resi.history[i].date);
					const month = date.toLocaleString("default", { month: "short" });
					const ddate = date.getDate();
					const year = date.getFullYear();
					const hour = date.getHours();
					const minutes = date.getMinutes();

					if (resi.history[i].desc.includes("DELIVERED TO")) {
						html = html.concat(
							`
					                <div class="tracking-item">
                                        <div class="tracking-icon status-inforeceived">
                                            <svg class="svg-inline--fa fa-clipboard-list fa-w-12" aria-hidden="true"
                                                data-prefix="fas" data-icon="clipboard-list" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z">
                                                </path>
                                            </svg>
					                        <!-- <i class="fas fa-shipping-fast"></i> -->
					                    </div>
					                    <div class="tracking-date">` +
								month +
								" " +
								ddate +
								" ," +
								year +
								`<span>` +
								hour +
								":" +
								minutes +
								`</span></div>
					                    <div class="tracking-content">` +
								resi.history[i].desc +
								`.<span>` +
								resi.history[i].location +
								`</span></div>
					                </div>
					`
						);
					} else {
						html = html.concat(
							`
					                <div class="tracking-item">
					                    <div class="tracking-icon status-outfordelivery">
					                        <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true"
					                            data-prefix="fas" data-icon="shipping-fast" role="img"
					                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
					                            data-fa-i2svg="">
					                            <path fill="currentColor"
					                                d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z">
					                            </path>
					                        </svg>
					                        <!-- <i class="fas fa-shipping-fast"></i> -->
					                    </div>
					                    <div class="tracking-date">` +
								month +
								" " +
								ddate +
								" ," +
								year +
								`<span>` +
								hour +
								":" +
								minutes +
								`</span></div>
					                    <div class="tracking-content">` +
								resi.history[i].desc +
								`.<span>` +
								resi.history[i].location +
								`</span></div>
					                </div>
					`
						);
					}
				}

				html = html.concat(`            </div>
					        </div>
					    </div>
					</div>`);

				$("#track-info").html(html);
			} else {
				$("#resi-result").html(
					`
				<div class="col">
				<h1 class="text-center">` +
						result.message +
						`</h1>
				</div>
				`
				);
			}
		},
		error: function (e) {
			$("#load_button").css("display", "none");
			$("#search-button").css("display", "block");
			$("#error_log").css("display", "block");
		},
	});
});

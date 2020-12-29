// 1. 定义（路由）组件。
// 可以从其他文件 import 进来
const News = { template: `
<main class="container">

		<section class="py-5 text-center container">
			<div class="row py-lg-5">
				<div class="col-lg-6 col-md-8 mx-auto">
					<h1 class="fw-light">专辑范例</h1>
					<p class="lead text-muted">专辑范例专辑范例专辑范例专辑范例专辑范例专辑范例。专辑范例专辑范例专辑范例专辑范例专辑范例专辑范例。</p>
					<p>
						<a href="#" class="btn btn-primary my-2">点击一</a>
						<a href="#" class="btn btn-secondary my-2">点击二</a>
					</p>
				</div>
			</div>
		</section>


		<div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
			<img class="me-3" src="nrcss/bootstrap-logo-white.svg" alt="" width="48" height="38">
			<div class="lh-1">
				<h1 class="h6 mb-0 text-white lh-1">新闻列表</h1>
				<small>时间： 2020-10</small>
			</div>
		</div>

		<div class="my-3 p-3 bg-white rounded shadow-sm">
			<h6 class="border-bottom pb-2 mb-0">新闻列表</h6>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

				<p class="pb-3 mb-0 small lh-sm border-bottom">
					<strong class="d-block text-gray-dark">@企业文化</strong>
					企业文化 企业文化 企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企
				</p>
			</div>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>

				<p class="pb-3 mb-0 small lh-sm border-bottom">
					<strong class="d-block text-gray-dark">@企业文化</strong>
					企业文化 企业文化 企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企
				</p>
			</div>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>

				<p class="pb-3 mb-0 small lh-sm border-bottom">
					<strong class="d-block text-gray-dark">@企业文化</strong>
					企业文化 企业文化 企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企
				</p>
			</div>
			<small class="d-block text-end mt-3">
				<a href="#">更多..</a>
			</small>
		</div>

		<div class="my-3 p-3 bg-white rounded shadow-sm">
			<h6 class="border-bottom pb-2 mb-0">信息列表</h6>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

				<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
					<div class="d-flex justify-content-between">
						<strong class="text-gray-dark">信息标题-信息标题</strong>
						<a href="#">更多..</a>
					</div>
					<span class="d-block">@用户名</span>
				</div>
			</div>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

				<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
					<div class="d-flex justify-content-between">
						<strong class="text-gray-dark">信息标题-信息标题</strong>
						<a href="#">更多..</a>
					</div>
					<span class="d-block">@用户名</span>
				</div>
			</div>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

				<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
					<div class="d-flex justify-content-between">
						<strong class="text-gray-dark">信息标题-信息标题</strong>
						<a href="#">更多..</a>
					</div>
					<span class="d-block">@用户名</span>
				</div>
			</div>
			<small class="d-block text-end mt-3">
				<span>信息结尾</span>
			</small>
		</div>
	</main>

` }
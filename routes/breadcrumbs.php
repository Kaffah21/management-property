<?php

// use Diglactic\Breadcrumbs\Breadcrumbs;
// use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// // Admin Dashboard
// Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
//     $trail->push('Dashboard', route('admin.dashboard'));
// });

// // Admin > Villas
// Breadcrumbs::for('admin.villas.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Villas', route('admin.villas.index'));
// });

// // Admin > Villas > Create
// Breadcrumbs::for('admin.villas.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.villas.index');
//     $trail->push('Create Villa', route('admin.villas.create'));
// });

// // Admin > Villas > Edit
// Breadcrumbs::for('admin.villas.edit', function (BreadcrumbTrail $trail, $villa) {
//     $trail->parent('admin.villas.index');
//     $trail->push("Edit Villa: $villa->name", route('admin.villas.edit', $villa->id));
// });

// // Admin > Rumah
// Breadcrumbs::for('admin.rumah.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Rumah', route('admin.rumah.index'));
// });

// // Admin > Rumah > Edit
// Breadcrumbs::for('admin.rumah.edit', function (BreadcrumbTrail $trail, $rumah) {
//     $trail->parent('admin.rumah.index');
//     $trail->push("Edit Rumah: $rumah->name", route('admin.rumah.edit', $rumah->id));
// });

// // Admin > Penyewa
// Breadcrumbs::for('admin.penyewa.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Penyewa', route('admin.penyewa.index'));
// });

// // Admin > Pemilik
// Breadcrumbs::for('admin.pemilik.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Pemilik', route('admin.pemilik.index'));
// });

// // Admin > Transaksi Rumah
// Breadcrumbs::for('admin.transaksi.rumah', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Transaksi Rumah', route('admin.transaksi.rumah'));
// });

// // Admin > Blogs
// Breadcrumbs::for('admin.blogs.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Blogs', route('admin.blogs.index'));
// });

// // Admin > FAQ
// Breadcrumbs::for('admin.faq.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('FAQ', route('admin.faq.index'));
// });

// // Admin > FAQ > Create
// Breadcrumbs::for('admin.faq.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.faq.index');
//     $trail->push('Create FAQ', route('admin.faq.create'));
// });

// // Admin > FAQ > Edit
// Breadcrumbs::for('admin.faq.edit', function (BreadcrumbTrail $trail, $faq) {
//     $trail->parent('admin.faq.index');
//     $trail->push("Edit FAQ: $faq->title", route('admin.faq.edit', $faq->id));
// });

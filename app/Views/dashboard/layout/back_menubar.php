<?php $request = service('request'); ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url() ?>/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= AuthUser()->nama; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="<?= $request->uri->getSegment(2) === "" ? 'active' : ''; ?>">
                <a href="<?php echo base_url('admin'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="<?= $request->uri->getSegment(2) === "media" ? 'active' : ''; ?>">
                <a href="<?php echo base_url('admin/media'); ?>">
                    <i class="fa fa-folder-open"></i> <span>Media</span>
                </a>
            </li>

            <li class="<?= $request->uri->getSegment(2) === "kategori" ? 'active' : ''; ?>">
                <a href="<?php echo base_url('admin/kategori'); ?>">
                    <i class="fa fa-tags"></i> <span>Kategori</span>
                </a>
            </li>
            <li class="<?= $request->uri->getSegment(2) === "projek" ? 'active' : ''; ?>">
                <a href="<?php echo base_url('admin/projek'); ?>">
                    <i class="fa fa-cog"></i> <span>Projek</span>
                </a>
            </li>

            <?php if (AuthUser()->level == 1) : ?>
                <li class="<?= $request->uri->getSegment(2) === "kontak" ? 'active' : ''; ?>">
                    <a href="<?php echo base_url('admin/kontak'); ?>">
                        <i class="fa fa-bell"></i> <span>Kontak</span>
                    </a>
                </li>
                <li class="<?= $request->uri->getSegment(2) === "user" ? 'active' : ''; ?>">
                    <a href="<?php echo base_url('admin/user'); ?>">
                        <i class="fa fa-user"></i> <span>User</span>
                    </a>
                </li>
                <li class="treeview <?= $request->uri->getSegment(2) === "setting" ? 'active' : ''; ?>">
                    <a href="#">
                        <i class="fa fa-gear"></i>
                        <span>Setting</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "judul") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/judul'); ?>"><i class="fa fa-text-height"></i> About Website</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "sosial_media") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/sosial_media'); ?>"><i class="fa fa-globe"></i> Sosial Media</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "master_slider") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/master_slider'); ?>"><i class="fa fa-picture-o"></i> Master Slider</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "logo") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/logo'); ?>"><i class="fa fa-circle-o"></i> Logo</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "location") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/location'); ?>"><i class="fa fa-map-marker"></i> Locations</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "contact") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/contact'); ?>"><i class="fa fa-address-book"></i> Contact</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "quick_link") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/quick_link'); ?>"><i class="fa fa-link"></i> Footer Quick Link</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "client") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/client'); ?>"><i class="fa fa-users"></i> Client</a></li>

                        <li class="<?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === "testimoni") ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/setting/testimoni'); ?>"><i class="fa fa-handshake-o"></i> Testimoni</a></li>
                    </ul>
                </li>
            <?php endif ?>
        </ul>
    </section>
</aside>
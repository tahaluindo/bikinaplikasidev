<?php $__env->startSection('page-info'); ?>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="<?php echo e(url('')); ?>/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">perhitungan</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <form action="<?php echo e(url("perhitungan/$perhitungan->id")); ?>" method="post" id="form-hitung">
                    <?php for($a = 0; $a <= count($kriteria->sortBy('nilai')); $a++): ?>
                        <?php if($a == 0): ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-bottom: 30px">
                                <div class="product-sales-chart">
                                    <div style="padding: 20px !important;"  class="table-responsive">

                                        <h4 class="text-center"><u>Matriks Konsistensi Kriteria</u></h4>
                                        <table class="table" id='dataTable'>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th title="<?php echo e($item->nama); ?>"><?php echo e("C" . ($key + 1)); ?></th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th>PRIORITY VECTOR</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id='<?php echo e($item->id); ?>'>
                                                    <td title="<?php echo e($item->nama); ?>"><b><?php echo e("C" . ($key1 + 1)); ?></b></td>
                                                    <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td>
                                                            <?php if($key1 == $key2): ?>
                                                                <input placeholder="nilai"
                                                                       class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                                       type="text" min="1" id="nilai" value="1"
                                                                       readonly>
                                                            <?php else: ?>
                                                                <?php if($key2 < $key1): ?>
                                                                    <input placeholder="nilai"
                                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                                           type="text" min="1" id="nilai"
                                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "auto"); ?>">
                                                                <?php else: ?>
                                                                    <input placeholder="nilai"
                                                                           class="add-input form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                                           type="text" min="1" id="nilai" value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : ""); ?>"
                                                                           required>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2 + 1] : "auto_priority"); ?>">
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2] : "auto_sum"); ?>">
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2 + 1] : "auto_sum_priority"); ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="<?php echo e($kriteria->count() + 1); ?>">Principle Eign Value</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][0] : "auto_principle_eign_value"); ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="<?php echo e($kriteria->count() + 1); ?>">Consistency Index</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][1] : "auto_consistency_index"); ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="<?php echo e($kriteria->count() + 1); ?>">Consistency Ratio</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][2] : "auto_consistency_ratio"); ?>">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-bottom: 30px">
                                <div class="product-sales-chart">
                                    <div style="padding: 20px !important;" class="table-responsive">

                                        <h4 class="text-center"><u>Matriks Konsistensi <?php echo e($kriteria[$a - 1]->nama); ?></u>
                                        </h4>
                                        <table class="table" id='dataTable'>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <?php $__currentLoopData = $kriteria[$a - 1]->kriteria_details->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th title="<?php echo e($item->keterangan); ?>"><?php echo e("SC" . ($key + 1)); ?></th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th>PRIORITY VECTOR</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $kriteria[$a - 1]->kriteria_details->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id='<?php echo e($item->id); ?>'>
                                                    <td title="<?php echo e($item->keterangan); ?>"><b><?php echo e("SC" . ($key1 + 1)); ?></b></td>
                                                    <?php $__currentLoopData = $kriteria[$a - 1]->kriteria_details->sortBy('nilai'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td>
                                                            <?php if($key1 == $key2): ?>
                                                                <input placeholder="nilai"
                                                                       class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                                       type="text" min="1" id="nilai" value="1"
                                                                       readonly>
                                                            <?php else: ?>
                                                                <?php if($key2 < $key1): ?>
                                                                    <input placeholder="nilai"
                                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                                           type="text" min="1" id="nilai"
                                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "auto"); ?>">
                                                                <?php else: ?>
                                                                    <input placeholder="nilai"
                                                                           class="add-input form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                                           type="text" min="1" id="nilai" value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : ""); ?>"
                                                                           required>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2 + 1] : "auto_priority"); ?>">
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>


                                                <?php $__currentLoopData = $kriteria[$a - 1]->kriteria_details->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2] : "auto_sum"); ?>">
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2 + 1] : "auto_sum_priority"); ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="<?php echo e($kriteria->count() + 1); ?>">Principle Eign Value</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][0] : "auto_principle_eign_value"); ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="<?php echo e($kriteria->count() + 1); ?>">Consistency Index</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][1] : "auto_consistency_index"); ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="<?php echo e($kriteria->count() + 1); ?>">Consistency Ratio</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="matriks_konsistensi[<?php echo e($a); ?>][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly value="<?php echo e(isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][2] : "auto_consistency_ratio"); ?>">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </form>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Data Masyarakat</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th title="<?php echo e($item->nama); ?>"><?php echo e($item->nama); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $alternatif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id='<?php echo e($item->id); ?>'>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td><?php echo e($item->nama); ?></td>

                                        <?php $__currentLoopData = $item->alternatif_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemAlternatifDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($itemAlternatifDetail->kriteria_detail->keterangan); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Hasil</u>
                            </h4>

                            <?php if(!isset($hasil_hitung)): ?>
                                <button class="btn btn-xl btn-primary btn-block" form="form-hitung">HITUNG</button>
                            <?php else: ?>
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Nama</th>
                                        <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo e($item->nama); ?></th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <th>Total</th>
                                        <th>Ranking</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $alternatif->sortByDesc('nilai_kriteria_total')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id='<?php echo e($item->id); ?>'>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($item->nama); ?></td>

                                            <?php $__currentLoopData = $item->nilai_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemNilaiKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><?php echo e($itemNilaiKriteria); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo e($item->nilai_kriteria_total); ?></th>
                                            <th><?php echo e($loop->iteration); ?></th>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-blt-covid-muhammad-ridho.bikinaplikasi.dev\resources\views/perhitungan/show.blade.php ENDPATH**/ ?>

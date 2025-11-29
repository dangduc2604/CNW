<?php
// display_csv_fixed.php
// Reads a specific CSV file from uploads/ and displays it as an HTML table.
// Place your CSV named '65HTTT_Danh_sach_diem_danh.csv' into d:/Xampp/htdocs/uploads/
// Then open http://localhost/display_csv_fixed.php

function h($s){ return htmlspecialchars($s, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }
$uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
$filename = '65HTTT_Danh_sach_diem_danh.csv';
$filepath = $uploadDir . $filename;

if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

// detect delimiter (simple heuristic)
function detect_delimiter($path){
    $candidates = [',',';','\t','|'];
    $txt = @file_get_contents($path, false, null, 0, 10240);
    if ($txt === false) return ',';
    $best = ','; $bestCount = 0;
    foreach ($candidates as $d){
        $count = substr_count($txt, $d);
        if ($count > $bestCount){ $bestCount = $count; $best = $d; }
    }
    return $best;
}

function parse_csv_rows($path, $delimiter=',', $max=10000){
    $rows = [];
    if (!file_exists($path)) return $rows;
    if (($h = fopen($path, 'r')) !== false){
        $c = 0;
        while (($data = fgetcsv($h, 0, $delimiter)) !== false){
            $rows[] = $data;
            if (++$c >= $max) break;
        }
        fclose($h);
    }
    return $rows;
}

$exists = file_exists($filepath);
$rows = [];
$delimiter = ',';
if ($exists){
    $delimiter = detect_delimiter($filepath);
    $rows = parse_csv_rows($filepath, $delimiter, 5000);
}
?><!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Hiển thị CSV: <?php echo h($filename); ?></title>
<style>
body{font-family:Arial,Helvetica,sans-serif;background:#f4f6f8;padding:18px}
.box{max-width:1200px;margin:0 auto;background:#fff;padding:18px;border-radius:8px;box-shadow:0 6px 24px rgba(20,20,20,0.06)}
.small{font-size:13px;color:#666}
table{width:100%;border-collapse:collapse;margin-top:12px}
th,td{border:1px solid #e9eef6;padding:8px;font-size:13px}
thead th{background:#f3f7fb;font-weight:700}
.msg{background:#fff3cd;padding:10px;border-radius:6px;margin-bottom:12px;color:#665200}
</style>
</head>
<body>
<div class="box">
  <h2>Hiển thị CSV</h2>
  <p class="small">File: <strong><?php echo h($filename); ?></strong></p>

  <?php if (!$exists): ?>
    <div class="msg">Không tìm thấy file. Vui lòng copy file <code><?php echo h($filename); ?></code> vào thư mục <code><?php echo h($uploadDir); ?></code> và tải lại trang.</div>
  <?php elseif (empty($rows)): ?>
    <div class="msg">File tồn tại nhưng không có nội dung hoặc không đọc được.</div>
  <?php else: ?>
    <div class="small">Dấu phân cách được phát hiện: <strong><?php echo h($delimiter === '\t' ? '\\t (tab)' : $delimiter); ?></strong></div>
    <div style="overflow:auto;margin-top:10px;max-height:760px;border:1px solid #f0f3f6;padding:8px;border-radius:6px">
      <table>
        <thead>
          <tr>
            <?php
            // assume first row is header
            $header = $rows[0];
            foreach($header as $col) echo '<th>' . h($col) . '</th>';
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          for($r=1;$r<count($rows);$r++){
              echo '<tr>';
              foreach($rows[$r] as $c) echo '<td>' . h($c) . '</td>';
              echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>

</div>
</body>
</html>

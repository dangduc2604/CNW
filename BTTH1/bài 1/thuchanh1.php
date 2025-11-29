<?php
session_start();

// ==== MẢNG DỮ LIỆU HOA ====
$flowers = [
    ["name" => "Hoa dạ yến thảo", 
    "desc" => "Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.",
    "img" => "hoadaYenThao.webp"],
    ["name" => "Hoa đồng tiền", "desc" => "Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.", 
    "img" => "hoadongTien.webp"],
    ["name" => "Hoa giấy", "desc" => "Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.", 
    "img" => "hoagiay.webp"],
    ["name" => "Hoa thanh tú", "desc" => "Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.", 
    "img" => "hoathanhtu.webp"],
    ["name" => "Hoa đèn lồng", "desc" => "Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.", 
    "img" => "hoadenLong.webp"],
    ["name" => "Hoa cẩm chướng", "desc" => "Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông. Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,… thậm chí có thể pha lẫn màu để tạo nên đường viền xinh xắn. Đặt một chậu hoa cẩm chướng trên bàn sẽ khiến căn phòng của bạn đẹp mắt hơn rất nhiều.", 
    "img" => "hoacamChuong.webp"],
    ["name" => "Hoa quỳnh anh", "desc" => "Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả. Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.", 
    "img" => "hoaquynhanh.webp"],
    ["name" => "Hoa Păng-xê", "desc" => "Vào mỗi độ tháng 4 về là dịp mà loài hoa Păng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ.", 
    "img" => "hoaPang-xe.webp"],
    ["name" => "Hoa sen", "desc" => "Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện thì cũng là lúc mùa sen lại về trên những cánh đồng bạt ngàn. Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn. Hoa có thể được trồng trong chiếc ao vườn nhà, có thể được trồng trong chậu trang trí đều đẹp cả. Những bông hoa đẹp nở rộ như báo hiệu một mùa hè tuyệt đẹp hiện hữu trong ngôi nhà của bạn.", 
    "img" => "hoasen.webp"],
    ["name" => "Hoa dừa cạn", "desc" => "Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng. Hoa nở không ngừng từ mùa xuân sang mùa hè cho đến tận mùa thu. Hoa có 3 màu cơ bản là trắng, hồng nhạt và tím nhạt, lá và hoa cùng nhau vươn lên khiến cho khóm dừa cạn tuy nhỏ bé nhưng luôn tràn đầy sức sống. Loài hoa này còn tượng trưng cho sự thành đạt và có khả năng trừ tà.", 
    "img" => "hoaduacan.webp"],
    ["name" => "Hoa sử quân tử", "desc" => "Sử quân tử là loài cây leo, hoa có cánh nhỏ xinh, màu hồng pha trắng hoặc đỏ tươi, mọc thành từng chùm khoe sắc trong nắng sớm, rung rinh trong gió. Hoa toát lên một vẻ đẹp vô cùng giản dị kèm theo mùi hương nồng đượm. Tuy nhẹ nhàng là thế nhưng sử quân tử lại có khả năng chịu được nắng nóng khắc nghiệt nên có thể trồng trong cả mùa hè.", 
    "img" => "hoaSuQuanTu.webp"],
    ["name" => "Cúc lá nho", "desc" => "Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương,… và những chiếc lá to với hình dáng răng cưa độc đáo. Hạt cúc lá nho nảy mầm nhanh vào mùa xuân, nở hoa sang tận mùa hè lẫn mùa thu. Đây là loại hoa biểu trưng cho sự giàu có và trường thọ.", 
    "img" => "CucLaNho.webp"],
    ["name" => "Cẩm tú cầu", "desc" => "Cẩm tú cầu là loại cây thường mọc thành bụi có hoa nở to thành từng chùm và đặc biệt thích hợp với mùa hè. Hoa ưa ánh nắng mặt trời từ bình minh cho đến khi lặn xuống mỗi chiều tà. Hoa có nhiều màu sắc như trắng, tím, hồng, xanh rất nhẹ nhàng. Hoa thích hợp trồng nơi sân vườn rộng rãi hoặc chậu nhỏ để trang trí nhà ở.", 
    "img" => "CamTuCau.webp"],
    ["name" => "Hoa cúc dại", "desc" => "Với phần thân mảnh mai nhưng luôn vươn lên mạnh mẽ, lại chịu được nhiệt độ cao, thậm chí là khi tiết trời hạn hán nên hoa cúc dại cực kỳ thích hợp trồng từ mùa xuân cho đến tận mùa hè nắng gắt. Hoa có màu trắng, hồng tươi sáng hay vàng cam nổi bật, không kiêu sa nhưng sức sống bền bỉ. Thậm chí khi hoa tàn, hạt rụng xuống đất lại tiếp tục phát triển vào mùa thu.", 
    "img" => "HoaCucDai.webp"],
];

// ==== XỬ LÝ ĐĂNG NHẬP ADMIN ====
if (isset($_POST['login'])) {
    if ($_POST['password'] === "admin") {
        $_SESSION['admin'] = true;
    } else {
        $error = "Sai mật khẩu!";
    }
}

// ==== XỬ LÝ ĐĂNG XUẤT ====
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: thuchanh1.php");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách hoa – Guest/Admin</title>
<style>
body { font-family: Arial; padding:20px; background:#f7f7f7; }
.card { width:260px; background:#fff; padding:10px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin:10px; float:left; }
.card img { width:100%; height:160px; object-fit:cover; border-radius:8px; }
table { width:100%; border-collapse:collapse; margin-top:20px; }
td, th { border:1px solid #ccc; padding:8px; }
.actions button { margin-right:5px; }
</style>
</head>

<body>
<h2>🌸 Danh sách các loài hoa</h2>

<?php if (!isset($_SESSION['admin'])): ?>
    <!-- ===================== GUEST VIEW ===================== -->
    <a href="#" onclick="document.getElementById('loginBox').style.display='block'">Đăng nhập Admin</a>

    <div id="loginBox" style="display:none; margin:15px 0;">
        <form method="post">
            Mật khẩu admin: <input type="password" name="password">
            <button type="submit" name="login">Đăng nhập</button>
        </form>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>

    <div style="overflow:auto;">
    <?php foreach ($flowers as $f): ?>
        <div class="card">
            <img src="img/<?php echo $f['img']; ?>" alt="">
            <h3><?php echo $f['name']; ?></h3>
            <p><?php echo $f['desc']; ?></p>
        </div>
    <?php endforeach; ?>
    </div>

<?php else: ?>
    <!-- ===================== ADMIN VIEW ===================== -->
    <p>Xin chào Admin! <a href="?logout=1">Đăng xuất</a></p>

    <h3>Bảng hoa (CRUD – Demo bằng mảng)</h3>
    <table>
        <tr>
            <th>#</th>
            <th>Ảnh</th>
            <th>Tên Hoa</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($flowers as $i => $f): ?>
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><img src="img/<?php echo $f['img']; ?>" width="80" alt=""></td>
            <td><?php echo $f['name']; ?></td>
            <td><?php echo $f['desc']; ?></td>
            <td class="actions">
                <button>Sửa</button>
                <button>Xóa</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

<?php endif; ?>

</body>
</html>

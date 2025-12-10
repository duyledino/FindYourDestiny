<!doctype html>
<html class="light" lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>{{$user->user_name}} đã chủ động kết nối với bạn nè</title>
</head>
<body style="margin:0;padding:0;background-color:#f6f7fb;font-family: 'Helvetica Neue', Arial, sans-serif;">
  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:680px;margin:30px auto;background:#ffffff;border-radius:12px;box-shadow:0 6px 18px rgba(20,20,50,0.06);overflow:hidden;">
    <tr>
      <td style="padding:28px 32px 18px 32px;text-align:center;background:linear-gradient(120deg,#fff5f7,#fff8e7);">
        <h1 style="margin:0;font-size:22px;color:#2b2b33;">
          💌 {{$user->user_name}} đã chủ động kết nối với bạn nè!
        </h1>
        <p style="margin:10px 0 0 0;color:#5b6170;font-size:14px;">
          Có một người đang nghĩ về bạn — và họ đã chủ động gửi lời chào. Hãy mở xem ngay để nhận chút ngọt ngào nhé ✨
        </p>
      </td>
    </tr>

    <tr>
      <td style="padding:22px 32px 18px 32px;color:#3b3b45;">
        <p style="margin:0 0 14px 0;line-height:1.6;">
          Chào bạn thân mến,
        </p>

        <p style="margin:0 0 12px 0;line-height:1.6;">
          Người ấy — <strong>{{$user->user_name}}</strong> — vừa gửi lời chào ấm áp và chủ động kết nối với bạn. Có thể là một lời mời cà phê, một lời chúc buổi sáng, hay đơn giản chỉ là muốn nghe giọng bạn. Thật dễ thương đúng không?
        </p>

        <blockquote style="margin:14px 0;padding:12px 14px;background:#fff6fb;border-left:4px solid #ff7aa2;border-radius:6px;color:#5a4b57;">
          “Mình nghĩ về bạn — và mình muốn gặp bạn sớm thôi.” ❤️
        </blockquote>

        <p style="margin:12px 0 18px 0;line-height:1.6;">
          Nếu bạn cũng tò mò, đừng ngần ngại trả lời để bắt đầu một cuộc trò chuyện thú vị. Ai biết được — có thể đây là khởi đầu của một điều ngọt ngào mới.
        </p>

        {{-- <div style="text-align:center;margin:16px 0;">
          <a href="#" style="display:inline-block;text-decoration:none;padding:12px 22px;border-radius:8px;border:1px solid #ff7aa2;background:linear-gradient(180deg,#ff7aa2,#ff6f94);color:#fff;font-weight:600;">
            XEM NGAY & TRẢ LỜI
          </a>
        </div> --}}

        <p style="margin:0 0 10px 0;font-size:13px;color:#7a7d86;line-height:1.5;">
          Nếu bạn chưa sẵn sàng trả lời, có thể lưu lại tin nhắn này và mở khi trái tim mách bảo. 💭
        </p>
      </td>
    </tr>

    <tr>
      <td style="padding:18px 32px 26px 32px;background:#fafafa;color:#8b8e96;font-size:12px;text-align:center;">
        <div style="margin-bottom:10px;">
          Gợi ý nhỏ: một tin nhắn ngắn, ấm áp có khi đủ để làm ngày của ai đó bừng sáng ✨
        </div>
        <div style="color:#b0b3b9;">
          © {{ date('Y') }} — Gửi bằng một chút ngọt ngào
        </div>
      </td>
    </tr>
  </table>
</body>
</html>

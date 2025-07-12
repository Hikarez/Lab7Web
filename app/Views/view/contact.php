<?= $this->include('template/header'); ?>

<style>
  body {
    background: #0f172a;
    color: #f1f5f9;
    font-family: 'Inter', sans-serif;
  }

  .contact-section {
    padding: 6rem 1rem 4rem;
    text-align: center;
  }

  .profile-img {
    max-width: 300px;
    border-radius: 1rem;
    margin-bottom: 2rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
  }

  .lead-title {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
  }

  .contact-text {
    font-size: 1.1rem;
    line-height: 1.9;
    max-width: 800px;
    margin: 0 auto 2rem;
    opacity: 0.9;
  }

  .highlight {
    color: #8a2be2;
  }

  .email {
    font-size: 1.2rem;
    font-weight: 600;
    color: #8a2be2;
    margin-bottom: 1.5rem;
  }

  .social-icons {
    display: flex;
    justify-content: center;
    gap: 1.2rem;
    margin-top: 1rem;
  }

  .social-icons a img {
    width: 32px;
    transition: transform 0.3s ease;
  }

  .social-icons a:hover img {
    transform: scale(1.2);
  }

  @media (max-width: 768px) {
    .lead-title {
      font-size: 2rem;
    }

    .contact-text {
      font-size: 1rem;
    }
  }
</style>

<section class="contact-section container">



  <p class="contact-text">
    Terima kasih telah mengunjungi portal artikel kami.<br>
    Tertarik untuk mengirim artikel, berdiskusi topik, atau sekadar bertukar wawasan?<br>
    Kami siap membantu Anda berbagi informasi yang berdampak dan inspiratif.
  </p>

  <div class="email">rezaardi0501@gmail.com</div>


</section>

<?= $this->include('template/footer'); ?>

FROM php:8-cli

# Add a "docker" user
RUN useradd docker --shell /bin/bash --create-home \
  && usermod --append --groups sudo docker \
  && echo 'ALL ALL = (ALL) NOPASSWD: ALL' >> /etc/sudoers \
  && echo 'docker:secret' | chpasswd

# Composer install
RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && chmod +x /usr/local/bin/composer

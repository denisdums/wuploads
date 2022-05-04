![wuploads](assets/images/wuploads.svg)

# wuploads

A starter kit for frontend tests

# With :

- TailwindCss
- AlpineJs

## Install:

- ### Add wuploads to your known hosts
    ```bash
      sudo nano /etc/hosts
    ```
  and add :
  ```bash
    127.0.0.1 wuploads.docker
  ```
- ### Install node-modules
    ```bash
      npm i
    ```
- ### Start docker
    ```bash
      cd docker
      docker compose up -d
      cd ..
    ```
- ### Start webpack
    ```bash
      npm run start
    ```

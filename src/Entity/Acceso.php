<?php

namespace App\Entity;

use App\Repository\AccesoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccesoRepository::class)]
class Acceso
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"string", length:100, nullable: true)]
    private ?string $host = null;

    #[ORM\Column(type:"string", length:50, nullable: true)]
    private ?string $ip = null;

    #[ORM\Column(name: 'remote_user', type:"string", length:100, nullable: true)]
    private ?string $remoteUser = null;

    #[ORM\Column(name: 'auth_user', type:"string", length:250, nullable: true)]
    private ?string $authUser = null;

    #[ORM\Column(type:"string", length: 50, nullable: true)]
    private ?string $timestamp = null;

    #[ORM\Column(type:"string", length: 30, nullable: true)]
    private ?string $method = null;

    #[ORM\Column(type:"string", length: 255, nullable: true)]
    private ?string $path = null;

    #[ORM\Column(type:"string", length: 50, nullable: true)]
    private ?string $protocol = null;

    #[ORM\Column(type:"integer", nullable: true)]
    private ?int $status = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $bytes = null;

    #[ORM\Column(type:"string", length: 255, nullable: true)]
    private ?string $referer = null;

    #[ORM\Column(name: 'user_agent', type:"string", length: 100, nullable: true)]
    private ?string $userAgent = null;

    #[ORM\Column(name: 'processed_at', type: "datetime", nullable: true)]
    private ?\DateTimeInterface $processedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function setHost(?string $host): void
    {
        $this->host = $host;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): void
    {
        $this->ip = $ip;
    }

    public function getRemoteUser(): ?string
    {
        return $this->remoteUser;
    }

    public function setRemoteUser(?string $remoteUser): void
    {
        $this->remoteUser = $remoteUser;
    }

    public function getAuthUser(): ?string
    {
        return $this->authUser;
    }

    public function setAuthUser(?string $authUser): void
    {
        $this->authUser = $authUser;
    }

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    public function setTimestamp(?string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(?string $protocol): void
    {
        $this->protocol = $protocol;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    public function getBytes(): ?int
    {
        return $this->bytes;
    }

    public function setBytes(?int $bytes): void
    {
        $this->bytes = $bytes;
    }

    public function getReferer(): ?string
    {
        return $this->referer;
    }

    public function setReferer(?string $referer): void
    {
        $this->referer = $referer;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    public function getProcessedAt(): ?\DateTimeInterface
    {
        return $this->processedAt;
    }

    public function setProcessedAt(?\DateTimeInterface $processedAt): void
    {
        $this->processedAt = $processedAt;
    }



}
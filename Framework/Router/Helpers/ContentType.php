<?php

namespace Jarvis\Router\Helpers;

class ContentType
{
    # Text Content-Type
    const TEXT = "text/plain";
    const HTML = "text/html";
    const JAVASCRIPT = "text/javascript";
    const CSS = "text/css";
    const MARKDOWN = "text/markdown";

    # Image Content-Type
    const JPEG = "image/jpeg";
    const PNG = "image/png";
    const BMP = "image/bmp";
    const GIF = "image/gif";
    const WEBP = "image/webp";
    const IMAGE = "image/*";

    # Audio Content-Type
    const MIDI = "audio/midi";
    const WEBM = "audio/webm";
    const WAV = "audio/wav";
    const MPEG = "audio/mpeg";
    const OGG = "audio/ogg";
    const AUDIO = "audio/*";

    # Video Content-Type
    const MP4 = "video/mp4";
    const VIDEO = "video/*";

    # Application Content-Type
    const OCTETSTREAM = "application/octet-stream";
    const JSON = "application/json";
    const XML = "application/xml";
    const PDF = "application/pdf";
    const FORM = "multipart/form-data";
}

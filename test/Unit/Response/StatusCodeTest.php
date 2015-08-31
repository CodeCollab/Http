<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Response;

use CodeCollab\Http\Response\StatusCode;

class StatusCodeTest extends \PHPUnit_Framework_TestCase
{
    protected $class = 'CodeCollab\Http\Response\StatusCode';

    /**
     *
     */
    public function testConstantValueContinue()
    {
        $this->assertSame(100, StatusCode::CONTINUE);
    }

    /**
     *
     */
    public function testConstantValueSwitchingProtocols()
    {
        $this->assertSame(101, StatusCode::SWITCHING_PROTOCOLS);
    }

    /**
     *
     */
    public function testConstantValueProcessing()
    {
        $this->assertSame(102, StatusCode::PROCESSING);
    }

    /**
     *
     */
    public function testConstantValueOk()
    {
        $this->assertSame(200, StatusCode::OK);
    }

    /**
     *
     */
    public function testConstantValueCreated()
    {
        $this->assertSame(201, StatusCode::CREATED);
    }

    /**
     *
     */
    public function testConstantValueAccepted()
    {
        $this->assertSame(202, StatusCode::ACCEPTED);
    }

    /**
     *
     */
    public function testConstantValueNonAuthorativeInformation()
    {
        $this->assertSame(203, StatusCode::NON_AUTHORITATIVE_INFORMATION);
    }

    /**
     *
     */
    public function testConstantValueNoContent()
    {
        $this->assertSame(204, StatusCode::NO_CONTENT);
    }

    /**
     *
     */
    public function testConstantValueResetContent()
    {
        $this->assertSame(205, StatusCode::RESET_CONTENT);
    }

    /**
     *
     */
    public function testConstantValuePartialContent()
    {
        $this->assertSame(206, StatusCode::PARTIAL_CONTENT);
    }

    /**
     *
     */
    public function testConstantValueMultiStatus()
    {
        $this->assertSame(207, StatusCode::MULTI_STATUS);
    }

    /**
     *
     */
    public function testConstantValueAlreadyReported()
    {
        $this->assertSame(208, StatusCode::ALREADY_REPORTED);
    }

    /**
     *
     */
    public function testConstantValueImUsed()
    {
        $this->assertSame(226, StatusCode::IM_USED);
    }

    /**
     *
     */
    public function testConstantValueMultipleChoices()
    {
        $this->assertSame(300, StatusCode::MULTIPLE_CHOICES);
    }

    /**
     *
     */
    public function testConstantValueMovedPermanently()
    {
        $this->assertSame(301, StatusCode::MOVED_PERMANENTLY);
    }

    /**
     *
     */
    public function testConstantValueFound()
    {
        $this->assertSame(302, StatusCode::FOUND);
    }

    /**
     *
     */
    public function testConstantValueSeeOther()
    {
        $this->assertSame(303, StatusCode::SEE_OTHER);
    }

    /**
     *
     */
    public function testConstantValueNotModified()
    {
        $this->assertSame(304, StatusCode::NOT_MODIFIED);
    }

    /**
     *
     */
    public function testConstantValueUseProxy()
    {
        $this->assertSame(305, StatusCode::USE_PROXY);
    }

    /**
     *
     */
    public function testConstantValueReserved()
    {
        $this->assertSame(306, StatusCode::RESERVED);
    }

    /**
     *
     */
    public function testConstantValueTemporaryRedirect()
    {
        $this->assertSame(307, StatusCode::TEMPORARY_REDIRECT);
    }

    /**
     *
     */
    public function testConstantValuePermanentRedirect()
    {
        $this->assertSame(308, StatusCode::PERMANENTLY_REDIRECT);
    }

    /**
     *
     */
    public function testConstantValueBadRequest()
    {
        $this->assertSame(400, StatusCode::BAD_REQUEST);
    }

    /**
     *
     */
    public function testConstantValueUnauthorized()
    {
        $this->assertSame(401, StatusCode::UNAUTHORIZED);
    }

    /**
     *
     */
    public function testConstantValuePaymentRequired()
    {
        $this->assertSame(402, StatusCode::PAYMENT_REQUIRED);
    }

    /**
     *
     */
    public function testConstantValueForbidden()
    {
        $this->assertSame(403, StatusCode::FORBIDDEN);
    }

    /**
     *
     */
    public function testConstantValueNotFound()
    {
        $this->assertSame(404, StatusCode::NOT_FOUND);
    }

    /**
     *
     */
    public function testConstantValueMethodNotAllowed()
    {
        $this->assertSame(405, StatusCode::METHOD_NOT_ALLOWED);
    }

    /**
     *
     */
    public function testConstantValueNotAcceptable()
    {
        $this->assertSame(406, StatusCode::NOT_ACCEPTABLE);
    }

    /**
     *
     */
    public function testConstantValueProxyAuthenticationRequired()
    {
        $this->assertSame(407, StatusCode::PROXY_AUTHENTICATION_REQUIRED);
    }

    /**
     *
     */
    public function testConstantValueRequestTimeout()
    {
        $this->assertSame(408, StatusCode::REQUEST_TIMEOUT);
    }

    /**
     *
     */
    public function testConstantValueConflict()
    {
        $this->assertSame(409, StatusCode::CONFLICT);
    }

    /**
     *
     */
    public function testConstantValueGone()
    {
        $this->assertSame(410, StatusCode::GONE);
    }

    /**
     *
     */
    public function testConstantValueLengthRequired()
    {
        $this->assertSame(411, StatusCode::LENGTH_REQUIRED);
    }

    /**
     *
     */
    public function testConstantValuePreconditionFailed()
    {
        $this->assertSame(412, StatusCode::PRECONDITION_FAILED);
    }

    /**
     *
     */
    public function testConstantValueRequestEntityTooLarge()
    {
        $this->assertSame(413, StatusCode::REQUEST_ENTITY_TOO_LARGE);
    }

    /**
     *
     */
    public function testConstantValueRequestUriTooLong()
    {
        $this->assertSame(414, StatusCode::REQUEST_URI_TOO_LONG);
    }

    /**
     *
     */
    public function testConstantValueUnsupportedMediaType()
    {
        $this->assertSame(415, StatusCode::UNSUPPORTED_MEDIA_TYPE);
    }

    /**
     *
     */
    public function testConstantValueRequestedRangeNotSatisfiable()
    {
        $this->assertSame(416, StatusCode::REQUESTED_RANGE_NOT_SATISFIABLE);
    }

    /**
     *
     */
    public function testConstantValueExpectationFailed()
    {
        $this->assertSame(417, StatusCode::EXPECTATION_FAILED);
    }

    /**
     *
     */
    public function testConstantValueIAmATeapot()
    {
        $this->assertSame(418, StatusCode::I_AM_A_TEAPOT);
    }

    /**
     *
     */
    public function testConstantValueUnprocessableEntity()
    {
        $this->assertSame(422, StatusCode::UNPROCESSABLE_ENTITY);
    }

    /**
     *
     */
    public function testConstantValueLocked()
    {
        $this->assertSame(423, StatusCode::LOCKED);
    }

    /**
     *
     */
    public function testConstantValueFailedDependency()
    {
        $this->assertSame(424, StatusCode::FAILED_DEPENDENCY);
    }

    /**
     *
     */
    public function testConstantValueReservedForWebdavAdvancedCollectionsExpiredProposal()
    {
        $this->assertSame(425, StatusCode::RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL);
    }

    /**
     *
     */
    public function testConstantValueUpgradeRequired()
    {
        $this->assertSame(426, StatusCode::UPGRADE_REQUIRED);
    }

    /**
     *
     */
    public function testConstantValuePreconditionRequired()
    {
        $this->assertSame(428, StatusCode::PRECONDITION_REQUIRED);
    }

    /**
     *
     */
    public function testConstantValueTooManyRequests()
    {
        $this->assertSame(429, StatusCode::TOO_MANY_REQUESTS);
    }

    /**
     *
     */
    public function testConstantValueRequestHeaderFieldsTooLarge()
    {
        $this->assertSame(431, StatusCode::REQUEST_HEADER_FIELDS_TOO_LARGE);
    }

    /**
     *
     */
    public function testConstantValueInternalServerError()
    {
        $this->assertSame(500, StatusCode::INTERNAL_SERVER_ERROR);
    }

    /**
     *
     */
    public function testConstantValueNotImplemented()
    {
        $this->assertSame(501, StatusCode::NOT_IMPLEMENTED);
    }

    /**
     *
     */
    public function testConstantValueBadGateway()
    {
        $this->assertSame(502, StatusCode::BAD_GATEWAY);
    }

    /**
     *
     */
    public function testConstantValueServiceUnavailable()
    {
        $this->assertSame(503, StatusCode::SERVICE_UNAVAILABLE);
    }

    /**
     *
     */
    public function testConstantValueGatewayTimeout()
    {
        $this->assertSame(504, StatusCode::GATEWAY_TIMEOUT);
    }

    /**
     *
     */
    public function testConstantValueVersionNotSupported()
    {
        $this->assertSame(505, StatusCode::VERSION_NOT_SUPPORTED);
    }

    /**
     *
     */
    public function testConstantValueVariantAlsoNegotiatesExperimental()
    {
        $this->assertSame(506, StatusCode::VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL);
    }

    /**
     *
     */
    public function testConstantValueInsufficientStorage()
    {
        $this->assertSame(507, StatusCode::INSUFFICIENT_STORAGE);
    }

    /**
     *
     */
    public function testConstantValueLoopDetected()
    {
        $this->assertSame(508, StatusCode::LOOP_DETECTED);
    }

    /**
     *
     */
    public function testConstantValueNotExtended()
    {
        $this->assertSame(510, StatusCode::NOT_EXTENDED);
    }

    /**
     *
     */
    public function testConstantValueNetworkAuthenticationRequired()
    {
        $this->assertSame(511, StatusCode::NETWORK_AUTHENTICATION_REQUIRED);
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextContinue()
    {
        $this->assertSame('Continue', (new StatusCode)->getText(StatusCode::CONTINUE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextSwitchingProtocols()
    {
        $this->assertSame('Switching Protocols', (new StatusCode)->getText(StatusCode::SWITCHING_PROTOCOLS));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextOk()
    {
        $this->assertSame('OK', (new StatusCode)->getText(StatusCode::OK));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextCreated()
    {
        $this->assertSame('Created', (new StatusCode)->getText(StatusCode::CREATED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextAccepted()
    {
        $this->assertSame('Accepted', (new StatusCode)->getText(StatusCode::ACCEPTED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNonAuthoritativeInformation()
    {
        $this->assertSame('Non-Authoritative Information', (new StatusCode)->getText(StatusCode::NON_AUTHORITATIVE_INFORMATION));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNoContent()
    {
        $this->assertSame('No Content', (new StatusCode)->getText(StatusCode::NO_CONTENT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextResetContent()
    {
        $this->assertSame('Reset Content', (new StatusCode)->getText(StatusCode::RESET_CONTENT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextPartialContent()
    {
        $this->assertSame('Partial Content', (new StatusCode)->getText(StatusCode::PARTIAL_CONTENT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextMultiStatus()
    {
        $this->assertSame('Multi-Status', (new StatusCode)->getText(StatusCode::MULTI_STATUS));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextAlreadyReported()
    {
        $this->assertSame('Already Reported', (new StatusCode)->getText(StatusCode::ALREADY_REPORTED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextImUsed()
    {
        $this->assertSame('IM Used', (new StatusCode)->getText(StatusCode::IM_USED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextMultipleChoices()
    {
        $this->assertSame('Multiple Choices', (new StatusCode)->getText(StatusCode::MULTIPLE_CHOICES));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextMovedPermanently()
    {
        $this->assertSame('Moved Permanently', (new StatusCode)->getText(StatusCode::MOVED_PERMANENTLY));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextFound()
    {
        $this->assertSame('Found', (new StatusCode)->getText(StatusCode::FOUND));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextSeeOther()
    {
        $this->assertSame('See Other', (new StatusCode)->getText(StatusCode::SEE_OTHER));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNotModified()
    {
        $this->assertSame('Not Modified', (new StatusCode)->getText(StatusCode::NOT_MODIFIED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextUseProxy()
    {
        $this->assertSame('Use Proxy', (new StatusCode)->getText(StatusCode::USE_PROXY));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextReserved()
    {
        $this->assertSame('Reserved', (new StatusCode)->getText(StatusCode::RESERVED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextTemporaryRedirect()
    {
        $this->assertSame('Temporary Redirect', (new StatusCode)->getText(StatusCode::TEMPORARY_REDIRECT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextPermanentRedirect()
    {
        $this->assertSame('Permanent Redirect', (new StatusCode)->getText(StatusCode::PERMANENTLY_REDIRECT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextBadRequest()
    {
        $this->assertSame('Bad Request', (new StatusCode)->getText(StatusCode::BAD_REQUEST));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextUnauthorized()
    {
        $this->assertSame('Unauthorized', (new StatusCode)->getText(StatusCode::UNAUTHORIZED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextPaymentRequired()
    {
        $this->assertSame('Payment Required', (new StatusCode)->getText(StatusCode::PAYMENT_REQUIRED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextForbidden()
    {
        $this->assertSame('Forbidden', (new StatusCode)->getText(StatusCode::FORBIDDEN));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNotFound()
    {
        $this->assertSame('Not Found', (new StatusCode)->getText(StatusCode::NOT_FOUND));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextMethodNotAllowed()
    {
        $this->assertSame('Method Not Allowed', (new StatusCode)->getText(StatusCode::METHOD_NOT_ALLOWED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNotAcceptable()
    {
        $this->assertSame('Not Acceptable', (new StatusCode)->getText(StatusCode::NOT_ACCEPTABLE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextProxyAuthenticationRequired()
    {
        $this->assertSame('Proxy Authentication Required', (new StatusCode)->getText(StatusCode::PROXY_AUTHENTICATION_REQUIRED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextRequestTimeout()
    {
        $this->assertSame('Request Timeout', (new StatusCode)->getText(StatusCode::REQUEST_TIMEOUT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextConflict()
    {
        $this->assertSame('Conflict', (new StatusCode)->getText(StatusCode::CONFLICT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextGone()
    {
        $this->assertSame('Gone', (new StatusCode)->getText(StatusCode::GONE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextLengthRequired()
    {
        $this->assertSame('Length Required', (new StatusCode)->getText(StatusCode::LENGTH_REQUIRED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextPreconditionFailed()
    {
        $this->assertSame('Precondition Failed', (new StatusCode)->getText(StatusCode::PRECONDITION_FAILED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextRequestEntityTooLarge()
    {
        $this->assertSame('Request Entity Too Large', (new StatusCode)->getText(StatusCode::REQUEST_ENTITY_TOO_LARGE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextRequestUriTooLong()
    {
        $this->assertSame('Request-URI Too Long', (new StatusCode)->getText(StatusCode::REQUEST_URI_TOO_LONG));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextUnsupportedMediaType()
    {
        $this->assertSame('Unsupported Media Type', (new StatusCode)->getText(StatusCode::UNSUPPORTED_MEDIA_TYPE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextRequestedRangeNotSatisfiable()
    {
        $this->assertSame('Requested Range Not Satisfiable', (new StatusCode)->getText(StatusCode::REQUESTED_RANGE_NOT_SATISFIABLE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextExpectationFailed()
    {
        $this->assertSame('Expectation Failed', (new StatusCode)->getText(StatusCode::EXPECTATION_FAILED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextIAmATeapot()
    {
        $this->assertSame('I\'m a teapot', (new StatusCode)->getText(StatusCode::I_AM_A_TEAPOT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextUnprocessableEntity()
    {
        $this->assertSame('Unprocessable Entity', (new StatusCode)->getText(StatusCode::UNPROCESSABLE_ENTITY));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextLocked()
    {
        $this->assertSame('Locked', (new StatusCode)->getText(StatusCode::LOCKED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextFailedDependency()
    {
        $this->assertSame('Failed Dependency', (new StatusCode)->getText(StatusCode::FAILED_DEPENDENCY));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextReservedForWebdavAdvancedCollectionsExpiredProposal()
    {
        $this->assertSame(
            'Reserved for WebDAV advanced collections expired proposal',
            (new StatusCode)->getText(StatusCode::RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL)
        );
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextUpgradeRequired()
    {
        $this->assertSame('Upgrade Required', (new StatusCode)->getText(StatusCode::UPGRADE_REQUIRED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextPreconditionRequired()
    {
        $this->assertSame('Precondition Required', (new StatusCode)->getText(StatusCode::PRECONDITION_REQUIRED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextTooManyRequests()
    {
        $this->assertSame('Too Many Requests', (new StatusCode)->getText(StatusCode::TOO_MANY_REQUESTS));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextRequestHeaderFieldsTooLarge()
    {
        $this->assertSame(
            'Request Header Fields Too Large',
            (new StatusCode)->getText(StatusCode::REQUEST_HEADER_FIELDS_TOO_LARGE)
        );
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextInternalServerError()
    {
        $this->assertSame('Internal Server Error', (new StatusCode)->getText(StatusCode::INTERNAL_SERVER_ERROR));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNotImplemented()
    {
        $this->assertSame('Not Implemented', (new StatusCode)->getText(StatusCode::NOT_IMPLEMENTED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextBadGateway()
    {
        $this->assertSame('Bad Gateway', (new StatusCode)->getText(StatusCode::BAD_GATEWAY));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextServiceUnavailable()
    {
        $this->assertSame('Service Unavailable', (new StatusCode)->getText(StatusCode::SERVICE_UNAVAILABLE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextGatewayTimeout()
    {
        $this->assertSame('Gateway Timeout', (new StatusCode)->getText(StatusCode::GATEWAY_TIMEOUT));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextHttpVersionNotSupported()
    {
        $this->assertSame('HTTP Version Not Supported', (new StatusCode)->getText(StatusCode::VERSION_NOT_SUPPORTED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextVariantAlsoNegotiatesExperimental()
    {
        $this->assertSame(
            'Variant Also Negotiates (Experimental)',
            (new StatusCode)->getText(StatusCode::VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL)
        );
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextInsufficientStorage()
    {
        $this->assertSame('Insufficient Storage', (new StatusCode)->getText(StatusCode::INSUFFICIENT_STORAGE));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextLoopDetected()
    {
        $this->assertSame('Loop Detected', (new StatusCode)->getText(StatusCode::LOOP_DETECTED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNotExtended()
    {
        $this->assertSame('Not Extended', (new StatusCode)->getText(StatusCode::NOT_EXTENDED));
    }

    /**
     * @covers CodeCollab\Http\Response\StatusCode::getText
     */
    public function testGetTextNetworkAuthenticationRequired()
    {
        $this->assertSame(
            'Network Authentication Required',
            (new StatusCode)->getText(StatusCode::NETWORK_AUTHENTICATION_REQUIRED)
        );
    }
}

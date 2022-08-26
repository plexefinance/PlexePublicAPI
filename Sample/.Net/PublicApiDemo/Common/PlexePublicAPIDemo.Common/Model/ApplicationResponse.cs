using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public ApplicationResponseValue value { get; set; }
    }

    public class ApplicationResponseValue
    {
        public bool contactEmail { get; set; }
        public bool hasLoggedIn { get; set; }
        public string contractIPAddress { get; set; }
        public string contractSignatureLocation { get; set; }
        public string contractSignature2Location { get; set; }
        public string contractIPAddressSecondary { get; set; }
        public string contractSignatureLocationSecondary { get; set; }
        public string contractSignature2LocationSecondary { get; set; }
        public string cancelledReason { get; set; }
        public bool secondaryApplicantRequested { get; set; }
        public bool primaryApplicantAdded { get; set; }
        public bool secondaryApplicantAdded { get; set; }
        public string contractSignatureDate { get; set; }
        public string contractSignature2Date { get; set; }
        public string contractSignatureSecondaryDate { get; set; }
        public string contractSignature2SecondaryDate { get; set; }
        public bool contactSms { get; set; }
        public string acnType { get; set; }
        public string acn { get; set; }
        public int loanName { get; set; }
        public string loanType { get; set; }
        public string partnerId { get; set; }
        public string customerId { get; set; }
        public string abn { get; set; }
        public string businessName { get; set; }
        public string shortCode { get; set; }
        public string statusName { get; set; }
        public SecuredCommission securedCommission { get; set; }
        public DateTime createdDate { get; set; }
        public LineOfCreditCommission lineOfCreditCommission { get; set; }
        public string organisationId { get; set; }
        public string offerId { get; set; }
        public bool isUnitTrust { get; set; }
        public bool secured { get; set; }
        public string tradingName { get; set; }
        public string fullBusinessName { get; set; }
        public bool offerAccepted { get; set; }
        public ApplicationCommission applicationCommission { get; set; }
        public string id { get; set; }
    }
}
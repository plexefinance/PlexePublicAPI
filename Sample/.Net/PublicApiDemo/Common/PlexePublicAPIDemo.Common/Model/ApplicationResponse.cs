using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationResponse
    {
        public bool ContactEmail { get; set; }
        public bool HasLoggedIn { get; set; }
        public string ContractIPAddress { get; set; }
        public string ContractSignatureLocation { get; set; }
        public string ContractSignature2Location { get; set; }
        public string ContractIPAddressSecondary { get; set; }
        public string ContractSignatureLocationSecondary { get; set; }
        public string ContractSignature2LocationSecondary { get; set; }
        public string CancelledReason { get; set; }
        public bool SecondaryApplicantRequested { get; set; }
        public bool PrimaryApplicantAdded { get; set; }
        public bool SecondaryApplicantAdded { get; set; }
        public string ContractSignatureDate { get; set; }
        public string ContractSignature2Date { get; set; }
        public string ContractSignatureSecondaryDate { get; set; }
        public string ContractSignature2SecondaryDate { get; set; }
        public bool ContactSms { get; set; }
        public string AcnType { get; set; }
        public string Acn { get; set; }
        public int LoanName { get; set; }
        public string LoanType { get; set; }
        public string PartnerId { get; set; }
        public string CustomerId { get; set; }
        public string Abn { get; set; }
        public string BusinessName { get; set; }
        public string ShortCode { get; set; }
        public string StatusName { get; set; }
        public SecuredCommission SecuredCommission { get; set; }
        public DateTime CreatedDate { get; set; }
        public LineOfCreditCommission LineOfCreditCommission { get; set; }
        public string OrganisationId { get; set; }
        public string OfferId { get; set; }
        public bool IsUnitTrust { get; set; }
        public bool Secured { get; set; }
        public string TradingName { get; set; }
        public string FullBusinessName { get; set; }
        public bool OfferAccepted { get; set; }
        public ApplicationCommission ApplicationCommission { get; set; }
        public string Id { get; set; }
    }
}
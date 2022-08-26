using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{

    public class LoanResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public LoanResponseValue value { get; set; }
    }
    public class LoanResponseValue
    {
        public Commission Commission { get; set; }
        public string SalesPerson { get; set; }
        public DateTime? LastUpdated { get; set; }
        public bool? Secured { get; set; }
        public string LoanTypeName { get; set; }
        public string TradingName { get; set; }
        public string FullBusinessName { get; set; }
        public DateTime? NextAuditDate { get; set; }
        public int? AuditHighRange { get; set; }
        public int? AuditLowRange { get; set; }
        public string AuditType { get; set; }
        public List<string> AuditTypeList { get; set; }
        public DateTime? ClosedDate { get; set; }
        public bool? BalanceOverride { get; set; }
        public bool? Defaulted { get; set; }
        public string DefaultStatus { get; set; }
        public IList<Guid?> CustomerIds { get; set; }
        public LineOfCommission LineOfCommission { get; set; }
        public SecuredCommission SecuredCommission { get; set; }
        public string BusinessName { get; set; }
        public string CustomerFullName { get; set; }
        public Guid? ApplicationId { get; set; }
        public Guid? OfferId { get; set; }
        public int? LoanType { get; set; }
        public string LoanTypeFullname { get; set; }
        public bool? Enabled { get; set; }
        public bool? Closed { get; set; }
        public bool? Archived { get; set; }
        public string CustomerIdStr { get; set; }
        public bool? Revolving { get; set; }
        public bool? ShowAllDebtors { get; set; }
        public string BankId { get; set; }
        public string Funder { get; set; }
        public string Health { get; set; }
        public DateTime? CreatedDate { get; set; }
        public Guid? CustomerId { get; set; }
        public Guid? PartnerId { get; set; }
        public Guid? OrganisationId { get; set; }
        public bool? EnabledDebtors { get; set; }
        public Guid Id { get; set; }

    }
}

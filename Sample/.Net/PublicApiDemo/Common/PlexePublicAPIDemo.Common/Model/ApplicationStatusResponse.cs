using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationStatusResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public ApplicationStatusResponseValue value { get; set; }
    }

    public class ApplicationStatusResponseValue
    {
        public bool Draft { get; set; }
        public bool CustomerContacted { get; set; }
        public bool DataProviderConnected { get; set; }
        public bool GeneratingOffer { get; set; }
        public bool UnderReview { get; set; }
        public bool OfferAccepted { get; set; }
        public bool ApplicantDetailsAdded { get; set; }
        public bool ApplicationSubmitted { get; set; }
        public bool ContractComplete { get; set; }
        public bool ApplicationCompleted { get; set; }
        public bool Cancelled { get; set; }
    }
}
